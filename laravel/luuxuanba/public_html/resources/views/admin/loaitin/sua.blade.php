@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Tin
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{!!route('post.loaitin.sua',$loaitin->id)!!}" method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai">
                                    <option value="{!!$loaitin->theloai->id!!}">{{$loaitin->theloai->Ten}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <input class="form-control" name="Ten" value="{{$loaitin->Ten}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @stop()