<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Vote;
use App\Reputation;
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
        
        $message="Success";

        $cek = Vote::cek_vote($id,$user_id);
        //dd($reputation = Reputation::increment_reputation($id));
        if(!$cek){
            if($params['votes'] == 0){
                $cek_reputation = Reputation::cek_reputation($user_id);
                if($cek_reputation->reputation >= 15){
                    $data = Vote::save_vote($params);
                    if($params['votes'] == 1){
                        $reputation = Reputation::increment_reputation($id);
                    }
                }else{
                    $message = "Reputation minimum 15";
                    $data ="";
                }
            }else{
                $data = Vote::save_vote($params);
                if($params['votes'] == 1){
                    $reputation = Reputation::increment_reputation($id);
                }else{
                    $reputation = Reputation::decrement_reputation($user_id);
                }
            }
        }elseif($cek->votes == $request->votes){
            $data = DB::table('votes')->where('parent_id',$id)->where('user_id',$user_id)->delete();
            if($params['votes'] == 1){
                $reputation = Reputation::decrement_reputation($id);
            }
        }else{
            $data = Vote::update_vote($id, $user_id, $params);
            if($params['votes'] == 1){
                $reputation = Reputation::increment_reputation($id);
            }else{
                $reputation = Reputation::decrement_reputation($user_id);
            }
        }

        if ($data) {
            $output = array("status" => "success",
                            "message"=>$message);
            echo json_encode($output);
        }else{
            $output = array("status" => "error",
                            "message"=>$message);
            echo json_encode($output);
        }
        // dd($cek->votes);
    }
}
