<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StackController extends Controller
{
    public function index(){
    	return view('content.index');
    }
}
