<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TheLoaiRequest;
use Illuminate\Http\Request;
use App\Theloai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class TheLoaiController extends Controller {
	public function getDanhSach(){
		$theloai= Theloai::all();
		//var_dump($theloai);
		return view('admin.theloai.danhsach',compact('theloai'));
	}
	/*them*/
	public function getThem(){
		return view('admin.theloai.them');
	}
	public function postThem(Request $rq){
		$this->validate($rq, [
				'Ten'        => 'required|min:3|max:50',
				
			]);
		$theloai=new Theloai();
		$theloai->Ten=$rq->Ten;
		$theloai->TenKhongDau=changeTitle($rq->Ten);
		$theloai->save();
		return redirect()->route('get.theloai.them')->with('thongbao','them thanh cong');
	}
	/*sua*/
	public function getSua($id){
		$tl= Theloai::find($id);
		// var_dump($theloai->id);die; 
		return view('admin.theloai.sua',['tl'=>$tl]);
	}
	public function postSua(Request $rq,$id){
		$this->validate($rq, [
				'Ten'        => 'required|min:3|max:50',
			]);
		$theloai= Theloai::find($id);
		$theloai->Ten=$rq->Ten;
		$theloai->TenKhongDau=changeTitle($rq->Ten);
		$theloai->save();
		return redirect()->route('get.theloai.sua',$id)->with('message','edit thành công');
		}
	public function getDelete(){
		$theloai= Theloai::find($id);
		$theloai->delete();
		return redirect()->route('get.theloai.danhsach');
	}	

}
