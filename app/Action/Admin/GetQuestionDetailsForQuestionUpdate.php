<?php

namespace App\Action\Admin;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class GetQuestionDetailsForQuestionUpdate
{
    public function getQuestionAndRelatedAnswersForUpdate(string $questionId): View|Factory|Application
    {
        $question = Question::with('answers')->findOrFail($questionId);

        $answers = $question->answers->pluck('answer');

        $sendToBlade = $this->createValuesForShowInBladeView($question, $answers);

        return view('admin.question.update')->with($sendToBlade);
    }

    public function createValuesForShowInBladeView(Model|Collection|Question|null $question, mixed $answers): array
    {
        return [
            'question' => $question,
            'correct_answer' => $question->correct_answer,
            'answers' => $answers,
        ];
    }
}
