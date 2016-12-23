@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <ul class="alert alert-danger">
                                <li>{{$error}}</li>
                            </ul>
                        @endforeach
                    @endif
                     @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                        <form action="{!! route('post.theloai.sua',$tl->id) !!}" method="POST">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" value="{!!$tl->Ten!!}" placeholder="Please Enter Category Name" />
                            </div>
                       
                            <button type="submit" class="btn btn-default">Sửa</button>
                           
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @stop()