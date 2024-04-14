<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstaController extends Controller
{
    //search for users
    public function search(Request $request)
    {
        $client = new Client();

        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/search', [
            'json' => [
                'query' => $request->input('query'),
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512', // Replace with your actual RapidAPI Key
                'Content-Type' => 'application/json',
            ],
        ]);

        return response()->json(json_decode($response->getBody()->getContents()));
    }

    //get user info by username
    public function getUserInfo(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_info', [
            'json' => [
                'username' => $request->input('username'),
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512', // Replace with your actual RapidAPI Key
                'Content-Type' => 'application/json',
            ],
        ]);

        return response()->json(json_decode($response->getBody()->getContents()));
    }

    //get user info by id
    public function getUserInfoById(Request $request)
    {
        $client = new Client();

        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_info_by_id', [
            'json' => [
                'id' => $request->input('id'),
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512', // Replace with your actual RapidAPI Key
                'Content-Type' => 'application/json',
            ],
        ]);

        return response()->json(json_decode($response->getBody()->getContents()));
    }

    //get user stories by username
    public function getUserIdByUsername($username)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_info', [
            'json' => ['username' => $username],
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512', // Replace with your actual RapidAPI Key
                'Content-Type' => 'application/json',
            ],
        ]);

        $userInfo = json_decode($response->getBody()->getContents(), true);
        $userInfoStatus = $userInfo['status'] ?? null;
        if ($userInfoStatus === 'done') {
            // $userId = $userInfo['response']['body']['data']['user']['id']  ?? null;
            $userData = $userInfo['response']['body']['data']['user'] ?? null;
            return $userData;
        }
    }

    public function saveUserProfileImage($username)
    {
        $userData = $this->getUserIdByUsername($username);

        $profileImageUrl = $userData['profile_pic_url_hd'] ?? null;

        if ($profileImageUrl) {
            $imageContents = Http::get($profileImageUrl)->body();

            $fileName = 'profile_images/' . $username . '.jpg';
            Storage::disk('public')->put($fileName, $imageContents);

            $savedImagePath = asset('storage/' . $fileName);
            return $savedImagePath; // إرجاع URL الصورة المحلي
        }

        return 'Image not found or could not be saved';
    }
    public function saveimage(Request $request)
    {
        $imageUrl = $request->input('imageUrl');
        if ($imageUrl) {
            $imageContents = Http::get($imageUrl)->body();

            $fileName = 'stories/' . Str::random(20) . '.jpg';
            Storage::disk('public')->put($fileName, $imageContents);

            $savedImagePath = asset('storage/' . $fileName);
            return $savedImagePath; // إرجاع URL الصورة المحلي
        }

        return 'Image not found or could not be saved';
    }


    public function getStoriesByUsername($userId, $username)
    {
        $userData = $this->getUserIdByUsername($username);
        $userId = $userData['id'] ?? null;

        // dd($username, $userId);

        if (is_null($userId)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $client = new \GuzzleHttp\Client();
        //convert $userId to int
        $userId = (int) $userId;
        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_stories', [
            'json' => ['ids' => [$userId]],
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512', // Replace with your actual RapidAPI Key
                'Content-Type' => 'application/json',
            ],
        ]);

        return response()->json(json_decode($response->getBody()->getContents(), true));
    }
    public function getReelsByUsername(Request $request)
    {
        $username = $request->input('username');
        $maxId = null;
        $userData = $this->getUserIdByUsername($username);
        $userId = $userData['id'] ?? null;
        if (is_null($userId)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $client = new \GuzzleHttp\Client();
        $body = json_encode([
            "id" => $userId,
            "max_id" => $maxId
        ]);
        $userId = (int) $userId;
        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_clips', [
            'body' => $body,
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512',
                'content-type' => 'application/json',
            ],
        ]);

        return response()->json(json_decode($response->getBody(), true));
    }
    //get highlights by userid
    public function getHighlightsByUserId($userId)
    {
        if (is_null($userId)) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/user/get_highlights', [
            'body' => '{
            "id": ' . $userId . '

        }',
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512',
                'content-type' => 'application/json',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
    }
    public function getHighlightStories($highlightId)
    {
        $client = new \GuzzleHttp\Client();
        $highlightId = (int) $highlightId;
        $response = $client->request('POST', 'https://rocketapi-for-instagram.p.rapidapi.com/instagram/highlight/get_stories', [
            'body' => '{
    "ids": [
        ' . $highlightId . '
    ]
}',
            'headers' => [
                'X-RapidAPI-Host' => 'rocketapi-for-instagram.p.rapidapi.com',
                'X-RapidAPI-Key' => '5a0ed93267msh558409d00d55dd7p14dd91jsnae3c774bb512',
                'content-type' => 'application/json',
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
    public function getHighlightStoriesById(Request $request)
    {
        $highlightId = $request->input('highlightId');
        return response()->json($this->getHighlightStories($highlightId));
    }
    public function saveHighlightImage($imageUrl, $userId, $highlightId)
    {
        $filename = 'highlights/' . $userId . '_' . $highlightId . '.jpg';

        $imageContents = Http::get($imageUrl)->body();
        Storage::disk('public')->put($filename, $imageContents);
        return asset('storage/' . $filename);
    }
    public function getAllDataByUsername(Request $request)
    {
        $username = $request->input('username');
        $userData = $this->getUserIdByUsername($username);


        if (is_array($userData) && !empty($userData['is_private']) && $userData['is_private'] == true) {
            return response()->json([
                'error' => 'User is private',
                'error_code' => 402, // يمكنك تحديد رمز خطأ مخصص إذا أردت
                'user' => $userData
            ], 402);
        } else {
            $userId = $userData['id'] ?? null;
            $saveImageResponse = $this->saveUserProfileImage($username);
            $stories = $this->getStoriesByUsername($userId, $username);
            //if Userid unfefined
            if (is_null($userId)) {
                return response()->json(['error' => 'User not found'], 404);
            } else {

                $highlightsData = $this->getHighlightsByUserId($userId);
                $highlightsOutput = [];
                foreach ($highlightsData['response']['body']['data']['user']['edge_highlight_reels']['edges'] as $highlight) {
                    if (count($highlightsOutput) >= payment_settings('HighLighted_Limit_Number')) {
                        break; // إيقاف الحلقة لمنع إضافة المزيد من العناصر
                    }
                    $node = $highlight['node'];
                    $highlightId = $node['id'];
                    $highlightTitle = $node['title'];
                    $coverMediaCroppedThumbnail = $node['cover_media_cropped_thumbnail']['url'];
                    $imagePath = $this->saveHighlightImage($coverMediaCroppedThumbnail, $userId, $highlightId);
                    $highlightsOutput[] = [
                        'id' => $highlightId,
                        'title' => $highlightTitle,
                        'image_url' => $imagePath,
                    ];
                }
                return response()->json(['stories' => $stories, 'user' => $userData, 'highlights' => $highlightsOutput, 'saveImageResponse' => $saveImageResponse]);
            }
        }
    }
}
