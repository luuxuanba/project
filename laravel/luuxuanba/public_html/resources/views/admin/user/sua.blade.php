@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"  value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="text"  class="form-control" name="password"  value="">
                            </div>
                              <div class="form-group">
                                <label>level</label>
                                <input type="text" class="form-control" name="level"  value="{{$user->quyen}}">
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