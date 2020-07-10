<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\QuestionModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
{
	public function detail($id){
		// 
	}

    public function index(){
        $data = QuestionModel::get_all();
        return view('content.index', compact('data'));
    }

    public function store(Request $request){
        
        $user_id = Auth::id();
    	$request->request->add(["user_id"=>$user_id,"created_at"=> Carbon::now(),"updated_at"=> Carbon::now()]);
        $params = $request->all();
        unset($params['_token']);
        $data = QuestionModel::save_data($params);
        if($data){
            Alert::success('Your Question Has Been Posted', 'Success');
            return redirect('/stacloverload/quest');
        }else{
            Alert::error('Error Posted', 'Error');
            return redirect('/stacloverload/quest');
        }

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
