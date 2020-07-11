<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Bangkok");
class VoteController extends Controller
{
    public function save_vote($id, Request $request){
        $user_id = Auth::id();
    	$request->request->add(["parent_id"=>$id,"user_id"=>$user_id,"created_at"=> Carbon::now(),"updated_at"=> Carbon::now()]);
        $params = $request->all();
        $cek = DB::table('votes')->select('votes')->where('parent_id',$id)->where('user_id',$user_id)->first();
        if(!$cek){
            $data = Vote::save_vote($params);
        }elseif($cek->votes == $request->votes){
            $data = DB::table('votes')->where('parent_id',$id)->where('user_id',$user_id)->delete();
            
        }else{
            $data = Vote::update_vote($id, $user_id, $params);
        }
        if ($data) {
            $output = array("status" => "success");
            echo json_encode($output);
        }else{
            $output = array("status" => "error");
            echo json_encode($output);
        }
        // dd($cek->votes);
    }
}
