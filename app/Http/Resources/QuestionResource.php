<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->answer)
        {
            return ["correct" => ($request->answer == $this->right_answer)];
        }
        else
            return [
            'id' => $this->id,
            'questionText' => $this->question_text,
            'image' => URL::asset("images/questions/" . $this->image_name),
            'answers' => [$this->right_answer, $this->wrongAnswer0, $this->wrongAnswer1, $this->wrongAnswer2]
        ];
    }
}
