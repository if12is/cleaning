<?php

namespace Database\Seeders;

use App\Models\SessionRequest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $users_and_guests = [null];
            $users_ids = User::where('role', 'user')->pluck('id')->toArray();
            $users_and_guests = array_merge($users_and_guests, $users_ids);
            $users_and_guests = array_merge($users_and_guests, [null]);

            $generate_rand_session_id = strtoupper(bin2hex(random_bytes(20)));
            $status = ['active', 'blocked'];
            //generate real user_ip location randomly
            $user_ip = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);

            $request_count = mt_rand(1, 4);
            $last_request_date = now()->subHours(mt_rand(1, 20));
            SessionRequest::create([
                'user_id' => $users_and_guests[array_rand($users_and_guests)],
                'session_id' => $generate_rand_session_id,
                'status' => $status[array_rand($status)],
                'user_ip' => $user_ip,
                'request_count' => $request_count,
                'last_request_date' => $last_request_date,
            ]);
        }
    }
}
