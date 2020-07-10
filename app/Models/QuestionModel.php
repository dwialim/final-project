<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class QuestionModel{
    public static function get_all(){
        $data = DB::table('questions as A')
                ->select(DB::raw("A.id, A.title, A.content, A.tag, A.user_id, 
                (SELECT count(*) FROM votes WHERE parent_id=A.id AND votes='upvote') votes,
                (SELECT count(*) FROM answers WHERE question_id=A.id) answers"))
                ->paginate(10);
        return $data;
    }

    public static function get_by_id($id){
        $data = DB::table('questions')
                ->where('id',$id)
                ->first();
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

    public static function update_data($id, $params){
        $data = DB::table('questions')
                ->where('id',$id)
                ->update([
                    'title' => $params['title'],
                    'content' => $params['content'],
                    'tag' => $params['tag'],
                    'updated_at' => $params['updated_at']
                ]);
        
        return $data;
    }

    public static function delete_data($id){
        $data = DB::table('questions')
                    ->where('id', $id)
                    ->delete();
        return $data;
    }
}