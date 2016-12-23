<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use Illuminate\Http\Request;
class TinTucController extends Controller {
	public function getDanhSach(){
		$tt= TinTuc::orderBy('id','DESC')->get();
		return view('admin.tintuc.danhsach',['tintuc'=>$tt]);
	}
	public function getThem(){
		$loaitin= LoaiTin::all();
		$theloai=TheLoai::all();
		return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
	}
	public function postThem(Request $rq){
		$this->validate($rq, [
                'TieuDe'        => 'required|min:3|max:255',
                'TomTat'        => 'required|max:255',
                'Hinh'        => 'required',
                'NoiDung'        => 'required',
            ]);
		$tintuc = new TinTuc();
		$tintuc->idLoaiTin=$rq->loaitin;
		$tintuc->TieuDe= $rq->TieuDe;
		$tintuc->TieuDeKhongDau=changeTitle($rq->TieuDe);
		$tintuc->NoiDung=$rq->NoiDung;
		$tintuc->TomTat=$rq->TomTat;
		$tintuc->Hinh=$rq->Hinh;
		$tintuc->save();
		return redirect()->route('get.tintuc.danhsach');
	}
	public function getSua($id){
		$tintuc= TinTuc::find($id);

		return view('admin.tintuc.sua',compact('tintuc'));
	}
	public function postSua(Request $rq, $id){
		$this->validate($rq, [
                'TieuDe'        => 'required|min:3|max:255',
                'TomTat'        => 'required|max:255',
                'Hinh'        => 'required',
                'NoiDung'        => 'required',
            ]);
		$tintuc = TinTuc::find($id);
		$tintuc->idLoaiTin=$rq->loaitin;
		$tintuc->TieuDe= $rq->TieuDe;
		$tintuc->TieuDeKhongDau=changeTitle($rq->TieuDe);
		$tintuc->NoiDung=$rq->NoiDung;
		$tintuc->TomTat=$rq->TomTat;
		if($rq->hasFile('Hinh')){
			$tintuc->Hinh=$rq->Hinh;
		}else{
			$tintuc->Hinh="";
		}
		$tintuc->save();
		return redirect()->route('get.tintuc.danhsach');
	}
	public function getDelete($id){
		$tintuc= TinTuc::find($id);	
		$tintuc->delete();
		return redirect()->route('get.tintuc.danhsach');
	}
}
