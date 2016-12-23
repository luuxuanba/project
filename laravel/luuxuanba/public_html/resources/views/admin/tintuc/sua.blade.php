@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
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
                        
                        <form action="{!!route('post.tintuc.sua',$tintuc->id)!!}" method="POST">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="theloai" id="idtheloai" class="form-control">
                                    <option value="{{$tintuc->loaitin->theloai->id}}">{{$tintuc->loaitin->theloai->Ten}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select id="loaitin" name="loaitin" class="form-control">
                                    <option value="{{$tintuc->loaitin->id}}">{{$tintuc->loaitin->Ten}}</option>
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input type="text" class="form-control" name="TieuDe" value="{!!$tintuc->TieuDe!!}" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <input type="text" class="form-control" name="TomTat" value="{!!$tintuc->TomTat!!}/>
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
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                

              
            </div>
        
            <!-- /.container-fluid -->
        </div>
        @stop()