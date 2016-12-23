<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class PageController extends Controller
{
   /* Trang chu */
 	public function index(){
 		return view('page.index');
 	}
    /* Gioi Thieu*/
    public function getAbout(){
        return view('page.about');
    }
    /* Loai tin */
    public function getLoaitin($id){
    	$loaitin= LoaiTin::find($id);
    	$tintuc= TinTuc::where('idLoaiTin',$id)->paginate(5);
    	return view('page.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    /* Detail */
   	public function getDetail($id){
   		$tintuc= TinTuc::find($id);
   		$tinlienquan= TinTuc::where('idLoaiTin',$id)->take(4)->get();
   		$tinnoibat= TinTuc::where('NoiBat',1)->take(4)->get();
		return view('page.detail',['tintuc'=>$tintuc,'tlq'=>$tinlienquan,'tnb'=>$tinnoibat]);
    }
    /* Login */
    public function getLogin(){
    	return view('page.login');
    }
    public function postLogin(Request $rq){
        $this->validate($rq, [
                'email'        => 'required|email',
                'password'        => 'required',
            ]);
    	if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password])){
    		return redirect()->route('trangchu');
    	}else{
    		return redirect()->route('get.dangnhap');
    	}
    }
    /* Logout */
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('trangchu');
    }
    /* User manager */
    public function getUser(){
    	return view('page.account');
    }
    public function postUser(Request $rq){
        $this->validate($rq, [
                'name'        => 'required',
                'password'        => 'required',
                'passwordAgain'        => 'required|same:password',
            ]);
    	$user=User::find(Auth::user()->id);
    	$user->name=$rq->name;	
    	$user->email=Auth::user()->email;
    	if(!isset($rq->password)){
    		$user->password= bcrypt(Auth::user()->password);
    	}else{
    		$user->password=bcrypt($rq->password);
    	}
    	$user->quyen=Auth::user()->quyen;
    	$user->save();
    	return redirect()->route('get.user');
    }
    /* Register account */
    public function getRegister(){
    	return view('page.register');
    }
    public function postRegister(Request $rq){
        $this->validate($rq, [
                'name'          => 'required|max:10|unique:users,name',
                'email'         =>  'required|email|max:20|unique:users,email',
                'password'      => 'required|max:15',
                'passwordAgain' => 'required|same:password',
            ]);
    	$user= new User();
    	$user->name= $rq->name;
    	$user->email= $rq->email;
    	$user->password= bcrypt($rq->password);
    	$user->save();
    	return redirect()->route('get.dangnhap');
    }
    /* Search */
    public function postSearch(Request $rq){
        $key= $rq->key;
        $tintuc= TinTuc::where('TieuDe','like',"%$key%")->orWhere('TomTat','like',"%$key%")->orWhere('NoiDung','like',"%$key%")->take(30)->paginate(5);
        return view('page.search',['tintuc'=>$tintuc,'key'=>$key]);
    }
}
