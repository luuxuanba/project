<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LoaiTinRequest; 
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\TheLoai;
use Illuminate\Http\Request;

class LoaiTinController extends Controller {

	public function getThem(){
		$theloai=Theloai::get();
		
		return view('admin.loaitin.them',compact('theloai'));
	}
	public function postThem(Request $rq){
		$this->validate($rq, [
				'Ten'        => 'required|min:3|max:10',
			]);
		$loaitin= new LoaiTin();
		$loaitin->get();
		$loaitin->idTheLoai=$rq->TheLoai;
		$loaitin->Ten=$rq->Ten;
		$loaitin->TenKhongDau=changeTitle($rq->Ten);
		$loaitin->save();
		return redirect()->route('get.loaitin.them')->with('thongbao','them loai tin thanh cong');
	}
	public function getDanhSach(){
		$loaitin= LoaiTin::all();
		return view('admin.loaitin.danhsach',compact('loaitin'));
	}
	public function getSua($id){
		$loaitin= LoaiTin::find($id);
		return view('admin.loaitin.sua',compact('loaitin'));
	}			
	public function postSua(Request $rq,$id){
		$this->validate($rq, [
				'Ten'        => 'required|min:3|max:10',
			]);	
		$loaitin=LoaiTin::find($id);
		$loaitin->Ten=$rq->Ten;
		$loaitin->TenKhongDau=	changeTitle($rq->Ten);
		$loaitin->idTheLoai=$rq->TheLoai;
		$loaitin->save();
		return redirect()->route('get.loaitin.danhsach');
	}

	public function getDelete($id){
		$loaitin= LoaiTin::find($id);
		$loaitin->delete();
		return redirect()->route('get.loaitin.danhsach');
	}

}
