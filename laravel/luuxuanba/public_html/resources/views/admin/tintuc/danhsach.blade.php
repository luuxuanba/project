@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tieu De</th>
                                <th>Noi Dung</th>
                                <th>Noi Bat</th>
                                <th>So luot xem</th>
                                <th>The Loai</th>
                                <th>Loai tin</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}
                                    <img src="admin_asset/hinhanh/tintuc/{{$tt->Hinh}}" alt="">
                                </td>
                                <td>{{$tt->NoiDung}}</td>
                                <td>
                                @if($tt->NoiBat==0)
                                    {{'Khong'}}
                                    @else
                                    {{'Co'}}
                                @endif
                                </td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!route('get.tintuc.delete',$tt->id)!!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!route('get.tintuc.sua',$tt->id)!!}">Edit</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @stop