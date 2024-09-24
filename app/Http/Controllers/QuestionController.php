<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private array $validateRules = ['required', 'string'];
    public function createQuestion(): View|Factory|Application
    {
        return view('admin.question.create');
    }

    public function addQuestion(Request $request)
    {
        $this->validateQuestionRequest($request);

        $question = Question::create([
            'question' => $request['question'],
            'correct_answer' => $request['correct'],
        ]);

        if (!$question) {
            return redirect()->route('dashboard');
        }

        $answers = [
              "answer1" => $request['answer1'],
              "answer2" => $request['answer2'],
              "answer3" => $request['answer3'],
              "answer4" => $request['answer4'],
        ];

        foreach ($answers as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $answer
            ]);
        }

        return redirect()->route('dashboard');

    }

    public function validateQuestionRequest(Request $request): void
    {
        $request->validate([
            'question' => $this->validateRules,
            'correct' => $this->validateRules,
            'answer1' => $this->validateRules,
            'answer2' => $this->validateRules,
            'answer3' => $this->validateRules,
            'answer4' => $this->validateRules,
        ]);
    }
}
