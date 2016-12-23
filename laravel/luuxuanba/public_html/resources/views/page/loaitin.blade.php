 @extends('layout.index')
 @section('content')
<div class="container">
        <div class="row">
            @include('layout.menu')
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitin->Ten}}</b></h4>
                    </div>
                     @foreach($tintuc as $tt)
                    <div class="row-item row">
                         <!-- Hinh anh -->
                        <div class="col-md-3">
                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>
                        <!-- Tin tuc -->
                        <div class="col-md-9">
                            <a href="{!!route('chitiet',$tt->id)!!}"><h3>{{$tt->TieuDe}}</h3></a>
                            <p>{!!$tt->TomTat!!}</p>
                            <a class="btn btn-primary" href="{!!route('chitiet',$tt->id)!!}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- pagination -->
                    {!! str_replace('/?', '?', $tintuc->render()) !!}
            </div> 
        </div>
    </div>
 @stop()