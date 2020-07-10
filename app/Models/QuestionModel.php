<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class QuestionModel{
    public static function get_all(){
        $data = DB::table('questions')->paginate(10);
        return $data;
    }

    public static function save_data($params){
        $code = "Q".date('ymd');
        $id = DB::table('questions')
                    ->select(DB::raw('max(trim(id)) AS OLD_CODE'))
                    ->where('id','like', $code.'%')
                    ->first();
        //dd($id->OLD_CODE);
        $OLD_CODE=$id->OLD_CODE;
        if ($OLD_CODE == "") {
            $NEW_CODE = $code."0001";
        }else{
            $kd1= (int)substr($OLD_CODE,7, 4);
            $kd2 = 10000+$kd1+1;
            $NEW_CODE = $code.substr($kd2,1);
        }
        $params = $params + ['id' => $NEW_CODE];
        //dd($params + ['id' => $NEW_CODE]);
        $data = DB::table('questions')->insert($params);
        return $data;
    }
}