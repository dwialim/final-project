<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    public static function save_vote($params){
        $data = DB::table('votes')->insert($params);
        return $data;
    }

    public static function update_vote($id, $user_id, $params){
        $data = DB::table('votes')->where('parent_id',$id)->where('user_id',$user_id)->update([
            'votes' => $params['votes']
        ]);
        return $data;
    }

    public static function cek_vote($id,$user_id){
        $cek = DB::table('votes')->select('votes')->where('parent_id',$id)->where('user_id',$user_id)->first();
        return $cek;
    }
}
