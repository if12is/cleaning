<?php

namespace App\Services;

use App\Models\CommonQuestions;

class CommonQuestionsService
{
    public function getAllCommonQuestions()
    {
        return CommonQuestions::all();
    }

    public function updateCommonQuestions($request)
    {
        CommonQuestions::truncate();

        $data = $request['group-a'];
        //update the settings
        try {
            foreach ($data as $key => $value) {
                CommonQuestions::create([
                    'question' => $value['question'],
                    'answer' => $value['answer'],
                ]);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
