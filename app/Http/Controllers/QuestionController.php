<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\QuestionModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
{

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

    public function delete_data($id){
    	$data = QuestionModel::delete_data($id);
        if($data){
            Alert::success('Your Question Has Been Deleted', 'Success');
            return redirect('/stacloverload');
        }else{
            Alert::error('Error Deleting', 'Error');
            return redirect('/stacloverload');
        }
    }

    public function get_by_id($id){
        $data = QuestionModel::get_by_id($id);

        return json_encode($data);
    }

    public function update( $id, Request $request){
    	$request->request->add(["updated_at"=> Carbon::now()]);
        $params = $request->all();
        $data = QuestionModel::update_data($id, $params);
        if($data){
            Alert::success('Your Question Has Been Updated', 'Success');
            return redirect('/stacloverload');
        }else{
            Alert::error('Error Updating', 'Error');
            return redirect('/stacloverload');
        }
    }

    
}
