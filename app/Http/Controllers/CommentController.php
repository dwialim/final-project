<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id){
    	// 
    	return redirect('detail/'.$id);
    }
}
