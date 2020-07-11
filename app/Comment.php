<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'comments';

    public static function comments($id){
    	$simpan = DB::table('comments')->where('parent_id',$id)->get();
    	return $simpan;
    }
}
