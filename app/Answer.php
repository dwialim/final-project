<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AnswerModel
{
    protected $table = 'answers';
    public static function save($data, $user_id, $questid) {
        unset($data['_token']);
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = NULL;
        $data['question_id'] = $questid;
        $data['user_id'] = $user_id;
        dd ($data);die();
        $simpan = DB::table('answers')->insert($data);
        return $simpan;
    }
}