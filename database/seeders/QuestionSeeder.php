<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionJson = Storage::get("questions.json");
        $questionsByDifficulty = json_decode($questionJson, true);
        foreach ($questionsByDifficulty as $difficulty => $questions)
        {
            foreach ($questions as $questionData)
            {
                $question = new Question;
                $question->question_text = $questionData["question"];
                $question->difficulty = $difficulty;
                $question->image_name = $questionData["image"];
                $question->right_answer = $questionData["right_answer"];
                $question->wrongAnswer0 = $questionData["wrong_answers"][0];
                $question->wrongAnswer1 = $questionData["wrong_answers"][1];
                $question->wrongAnswer2 = $questionData["wrong_answers"][2];
                $question->save();
            }
        }

    }
}
