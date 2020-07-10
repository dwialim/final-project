<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionModel;

class StackController extends Controller
{
    public function index(){
        $data = QuestionModel::get_all();
        //return view('content.index', compact('data'));
        $tags = array();
        foreach($data as $item => $row){
            $iki = explode(" ",$row->tag);
            // $tags = array_push($tags, );
        }
        dd($iki);
    }
}
