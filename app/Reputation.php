<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reputation extends Model
{
    public static function decrement_reputation($id){
        $data = DB::table('users')
                    ->where('id',$id)
                    ->decrement('reputation',1);
        return $data;
    }

    public static function increment_reputation($id){
        $data = DB::table('users')
                    ->where('id',$id)
                    ->increment('reputation',10);
        return $data;
        // dd($data);
    }

    public static function cek_reputation($user_id){
        $data = DB::table('users')->select('reputation')->where('id', $user_id)->first();
        return $data;
    }

}
