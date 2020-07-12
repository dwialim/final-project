<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{

    public static function save_data($params) {
        $code = "A".date('ymd');
        $id = DB::table('answers')
                    ->select(DB::raw('max(trim(id)) AS OLD_CODE'))
                    ->where('id','like', $code.'%')
                    ->first();
        // dd($id->OLD_CODE);
        $OLD_CODE=$id->OLD_CODE;
        if ($OLD_CODE == "") {
            $NEW_CODE = $code."0001";
        }else{
            $kd1= (int)substr($OLD_CODE,7, 4);
            $kd2 = 10000+$kd1+1;
            $NEW_CODE = $code.substr($kd2,1);
        }
        $params = $params + ['id' => $NEW_CODE];
        
        $data = DB::table('answers')->insert($params);
        return $data;
    }

    public static function get_by_quest($id){
        $data = DB::table('answers')->where('question_id',$id)->get();
        return $data;
    }
}