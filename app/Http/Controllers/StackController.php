<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\QuestionModel;
use App\Question;

class StackController extends Controller
{
    public function index(){
        $data = Question::get_all();
        return view('content.index', compact('data'));
        // dd($data);
    }
}
