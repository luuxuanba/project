@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select id="theloai" name="theloai" class="form-control">
                                    @foreach($theloai as $theloai)
                                    <option value="{!! $theloai->id !!}">{{$theloai->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select id="loaitin" name="loaitin" class="form-control">
                                    @foreach($loaitin as $loaitin)
                                    <option value="{!! $loaitin->id !!}">{{$loaitin->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input type="text" class="form-control" name="TieuDe" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <input type="text" class="form-control" name="TomTat" />
                            </div>
                            <div class="form-group">
                                <label>Chọn Hình</label>
                                <input type="file" class="form-control" name="Hinh" />
                            </div>
                             <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="2" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Thêm</button>
                            
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
 @stop()     
@section('script')
     <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
           $("#theloai").change(function(){

                 var idTheLoai= $("#theloai").val();
                 
                 $.get("{!!url('admin/ajax/loaitin')!!}"+"/"+idTheLoai,function(data){
                
                        $("#loaitin").html(data);
                 });
           });
          
           
          
        });
    </script>
@stop()

