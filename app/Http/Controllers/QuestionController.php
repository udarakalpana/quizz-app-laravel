<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function createQuestion(): View|Factory|Application
    {
        return view('admin.question.create');
    }

    public function addQuestion(Request $request)
    {
        dd($request->all());
    }
}
