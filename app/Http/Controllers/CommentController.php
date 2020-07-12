<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
	public function index($id){
		if (substr($id,0,1) == "Q"){
			$table = 'questions';
		}else{
			$table = 'answers';
		}
		$data = DB::table($table)->where('id',$id)->first();
		return view('content.comment.create',compact('data'));
	}

	public function store(Request $req, $questid){
		$user_id = Auth::id();
		$comment = new Comment;
		$comment->id;
		$comment->content		= $req->content;
		$comment->created_at	= Carbon::now();
		$comment->updated_at	= NULL;
		$comment->parent_id	= $questid;
		$comment->user_id		= $user_id;
		$comment->save();

		if (substr($questid,0,1) == "Q"){
			return redirect('detail/'.$questid);
		}else{
			$data = DB::table('answers')->select('question_id')->where('id',$questid)->first();
			return redirect('detail/'.$data->question_id);
		}
		
	}
}