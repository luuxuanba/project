<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getList(){
    	$user= User::all();
    	return view('admin.user.danhsach',['user'=>$user]);

    }
    public function getAdd(){
    	return view('admin.user.them');
    }
    public function postAdd(Request $rq){
        $this->validate($rq, [
                'name'        => 'required|min:3|max:10',
                'email'        => 'required|email|unique:users,email',
                'level'        => 'required|numeric|between:0,1',
                'password'        => 'required|min:3|max:10',
                
            ]);
    	$user= new User();
    	$user->name=$rq->name;
    	$user->email=$rq->email;
    	$user->quyen=$rq->level;
    	$user->password=bcrypt($rq->password);
    	$user->save();
    	return redirect()->route('get.user.list');
    }
     public function getEdit($id){
     	$user= User::find($id);
     	return view('admin.user.sua',['user'=>$user]);
    }
     public function postEdit(Request $rq,$id){
        $this->validate($rq, [
                'name'        => 'required|min:3|max:10',
                'email'        => 'required|email|unique:users,email',
                'level'        => 'required|numeric|between:0,1',
                'password'        => 'required|min:3|max:10',
                
            ]);
     	$user= User::find($id);
     	$user->name=$rq->name;
    	$user->email=$rq->email;
    	$user->quyen=$rq->level;
    	$user->password=bcrypt($rq->password);
    	$user->save();
    	return redirect()->route('get.user.list');
    }
     public function getDelete($id){
     	$user= User::find($id);
     	$user->delete();
     	return redirect()->route('get.user.list');
    }
    public function getLoginAdmin(){
    	return view('admin.login');
    }
    public function postLoginAdmin(Request $rq){
    	if (Auth::attempt(['email' => "$rq->email", 'password' => "$rq->password" ]))
			{
			    return redirect()->route('get.theloai.danhsach')->with('message','success');
			}
			else{
				return redirect()->route('get.login');
			}
    }
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
