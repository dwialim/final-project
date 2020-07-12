<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $id = Auth::id();
        $data = User::get_by_id($id);
        return view('content.user', compact('data'));
        // dd($data);
    }
}
