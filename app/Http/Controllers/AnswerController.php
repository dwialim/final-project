<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index($id){
        // 
    }

    public function store(Request $request){
    	// 
    }

    public function edit($id){
    	// 
    }

    public function update(Request $request, $id){
    	// 
    }

    public function destroy($id){
    	// 
        return redirect('detail/'.$id);
    }
}
