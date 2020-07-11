<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use DateTime;

class AnswerController extends Controller
{
    public function index($id)
    {
        $data = Answer::get_answer($id);
        $data2 = Question::get($id);
        return view('detail.{question_id}.answer', compact('data', 'data2'));
    }

    public function store(Request $req, $questid)
    {
        $user_id = Auth::id();
        $simpan = AnswerModel::save($req->all(),$user_id,$questid);
        return redirect('detail/'. $questid);
    }

    public function edit($id){
    	// 
    }

    public function update(Request $request, $id){
    	// 
    }

    public function destroy($id){
    	// 
        return redirect('detail/'.$id);
    }
}