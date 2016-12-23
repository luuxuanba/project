<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function getDelete($id){
    	$comment=Comment::find($id);
    	$comment->delete();
    	return redirect()->back();
    }
    public function postComment(Request $rq,$id){
    	$comment= new Comment();
    	$comment->idTinTuc= $id;
    	$comment->idUser= Auth::user()->id;
    	$comment->NoiDung= $rq->noidung;
    	$comment->save();
    	return redirect()->route('chitiet',$id);
    }
}
