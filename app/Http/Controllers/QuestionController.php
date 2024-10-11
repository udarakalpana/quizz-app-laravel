<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Service\GetQuestion;
use Illuminate\Contracts\View\View;
use App\Action\Admin\CreateQuestion;
use App\Action\Admin\UpdateQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Http\Requests\QuestionCreateRequest;
use App\Action\Admin\GetQuestionDetailsForQuestionUpdate;

class QuestionController extends Controller
{
    public function createQuestion(): View|Factory|Application
    {
        return view('admin.question.create');
    }

    public function addQuestion(
        QuestionCreateRequest $request,
        CreateQuestion $createQuestion
    ): RedirectResponse {
        $validatedQuestionCreateRequest = $request->validated();

        if ($validatedQuestionCreateRequest) {
            $createQuestion->createQuestionAndAnswers($validatedQuestionCreateRequest);
        }

        return redirect()->route('dashboard')->with('warning', 'validation error have');
    }

    public function editQuestion(
        string $questionId,
        GetQuestionDetailsForQuestionUpdate $getQuestionDetailsForQuestionUpdate
    ): View|Factory|Application|RedirectResponse
    {
        if ($questionId) {
            return $getQuestionDetailsForQuestionUpdate->getQuestionAndRelatedAnswersForUpdate($questionId);
        }

        return redirect()->route('dashboard')->with('warning', 'validation error have');
    }

    public function updateQuestion(
        string $questionId,
        QuestionCreateRequest $request,
        UpdateQuestion $updateQuestion
    ): RedirectResponse {
        $validatedQuestionUpdateRequest = $request->validated();

        if ($validatedQuestionUpdateRequest) {
            $updateQuestion->updateQuestionAndAnswers($questionId, $validatedQuestionUpdateRequest);
        }

        return redirect()->route('dashboard')->with('warning', 'validation error have');
    }

    public function deleteQuestion(string $questionId): RedirectResponse
    {
        $question = GetQuestion::getQuestionByQuestionId($questionId);

        $question->delete();

        return redirect()->route('dashboard')->with('success', 'Question has been deleted');
    }
}
