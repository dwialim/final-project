<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use DateTime;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
date_default_timezone_set("Asia/Bangkok");

class AnswerController extends Controller
{
    public function index($id)
    {
        $data = Answer::get_answer($id);
        $data2 = Question::get($id);
        return view('detail.{id}.answer', compact('data', 'data2'));
    }

    public function store($id,Request $request)
    {

        $user_id = Auth::id();
    	$request->request->add(["question_id"=>$id,"user_id"=>$user_id,"created_at"=> Carbon::now(),"updated_at"=> Carbon::now()]);
        $params = $request->all();
        unset($params['_token']);
        $data = Answer::save_data($params);
        // dd($params);
        if($data){
            Alert::success('Your Answer Has Been Posted', 'Success');
            return redirect('detail/'. $id);
        }else{
            Alert::error('Error Posted', 'Error');
            return redirect('detail/'. $id);
        }
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