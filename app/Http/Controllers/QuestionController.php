<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
	public function detail($id){
		// 
	}

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
