<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard(): View|Factory|Application
    {

//        https://laravel-news.com/laravel-model-tips
        // lazy loading attempt
//        $questions = Question::all();

        // Eager loading attempt
        $questions = Question::with('answers')->get();

        return view('admin.dashboard')->with(['questions' => $questions]);
    }
}
