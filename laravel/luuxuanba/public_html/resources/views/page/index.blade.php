 @extends('layout.index')
 @section('content')
 @include('layout.menu');
            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>
	            	<div class="panel-body">
	            		<!-- item -->
	            		 @foreach($theloai as $tl)
		            		 @if(count($tl->loaitin))
							    <div class="row-item row">
				                	<h3>
				                		<a href="">{{$tl->Ten}}</a> 
				                		@foreach($tl->loaitin as $loaitin) 	
				                		|
				                		<small><a href="{!!route('get.loaitin',$loaitin->id)!!}"><i>{{$loaitin->Ten}}</i></a></small>
				                		@endforeach
				                	</h3>
				                	<?php 	$data= $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
				                			$tin1= $data->shift();
				                	 ?>
				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="detail.html">
					                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
					                        </a>
					                    </div>
					                    <div class="col-md-7">
					                        <h3><a href="{!!route('chitiet',$tin1['id'])!!}">{{$tin1['TieuDe']}}</a></h3>
					                        <p>{!!$tin1['TomTat']!!}</p>
					                        <a class="btn btn-primary" href="{!!route('chitiet',$tin1['id'])!!}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
				                	</div>
									<div class="col-md-4">
									@foreach($data as $item)
										<a href="{!!route('chitiet',$item->id)!!}">
											<h4>
												<span class="glyphicon glyphicon-list-alt"></span>
												{{$item['TieuDe']}}
											</h4>
										</a>
									@endforeach
									</div>
									
									<div class="break"></div>
				                </div>
			                @endif
		                @endforeach
		                <!-- end item -->
					</div>
	            </div>
        	</div>
        <!-- /.row -->
 </div>
@stop()