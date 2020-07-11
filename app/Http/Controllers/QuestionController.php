<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Question;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
date_default_timezone_set("Asia/Bangkok");
class QuestionController extends Controller
{
    public function detail($id){
        $data = DB::table('questions as A')
        ->select(DB::raw("A.*,  
        (SELECT COUNT(*) FROM votes WHERE parent_id=A.id AND votes=1)-
        (SELECT COUNT(*) FROM votes WHERE parent_id=A.id AND votes=0) as jml_vote,
        (SELECT case when votes=1 then 'upvote' else 'downvote' end FROM votes WHERE parent_id=A.id AND user_id=1) as user_vote"))
        ->where('id',$id)->get();
        foreach ($data as $key => $value) {
            $comment = comment::comments($value->id);
            foreach ($comment as $key_comment => $value_comment) {
                $value->komentar[$key_comment] = $value_comment->content;
            }
            if (!isset($value->komentar)) {
                $value->komentar[0] = " ";
            }
        }
        // dd($data);
        return view('content.detail',compact('data'));
    }

    public function index(){
        $data = Question::get_all();
        return view('content.index', compact('data'));
    }

    public function store(Request $request){
        
        $user_id = Auth::id();
    	$request->request->add(["user_id"=>$user_id,"created_at"=> Carbon::now(),"updated_at"=> Carbon::now()]);
        $params = $request->all();
        unset($params['_token']);
        $data = Question::save_data($params);
        if($data){
            Alert::success('Your Question Has Been Posted', 'Success');
            return redirect('/stacloverload/quest');
        }else{
            Alert::error('Error Posted', 'Error');
            return redirect('/stacloverload/quest');
        }

    }

    public function delete_data($id){
    	$data = Question::delete_data($id);
        if($data){
            Alert::success('Your Question Has Been Deleted', 'Success');
            return redirect('/stacloverload');
        }else{
            Alert::error('Error Deleting', 'Error');
            return redirect('/stacloverload');
        }
    }

    public function get_by_id($id){
        $data = Question::get_by_id($id);

        return json_encode($data);
    }

    public function update( $id, Request $request){
    	$request->request->add(["updated_at"=> Carbon::now()]);
        $params = $request->all();
        $data = Question::update_data($id, $params);
        if($data){
            Alert::success('Your Question Has Been Updated', 'Success');
            return redirect('/stacloverload');
        }else{
            Alert::error('Error Updating', 'Error');
            return redirect('/stacloverload');
        }
    }

    
}
