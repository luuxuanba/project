@extends('layout.index')
@section('content')
 <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>
                <!-- Author -->
                <p class="lead">
                    by <a href="#">ba</a>
                </p>
                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$tintuc->created_at}}</p>
                <hr>
                <!-- Post Content -->
                <p class="lead">{!!$tintuc->NoiDung!!}</p>
                <hr>
                <!-- Blog Comments -->
                <!-- Comments Form -->
                @if(isset($user_login))
                    <div class="well">
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" action="{!!route('post.comment',$tintuc->id)!!}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea name="noidung" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                @endif
                <hr>
                <!-- Posted Comments -->
                <!-- Comment -->
                @foreach($tintuc->comment as $cm)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$cm->user->name}}
                                <small>{{$cm->created_at}}</small>
                            </h4>
                            {!!$cm->NoiDung!!}
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <!-- Tin Liên Quan -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        <!-- item -->
                        @foreach($tlq as $tlq)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="">
                                        <img class="img-responsive" src="image/320x150.png" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="{!!route('chitiet',$tlq->id)!!}"><b>{!!$tlq->TieuDe!!}</b></a>
                                </div>
                                <p>{!!$tlq->TomTat!!}</p>
                                <div class="break"></div>
                            </div>
                        @endforeach
                        <!-- end item -->
                </div>
                <!-- Tin Liên Quan -->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach($tnb as $tnb)
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="detail.html">
                                        <img class="img-responsive" src="image/320x150.png" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="{!!route('chitiet',$tnb->id)!!}"><b>{!!$tnb->TieuDe!!}</b></a>
                                </div>
                                <!-- <p>{!!$tnb->TomTat!!}</p> -->
                                <div class="break"></div>
                            </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    @stop()