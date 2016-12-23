
      
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                   <<!-- ?php var_dump($theloai);die; ?> -->
					@foreach($theloai as $tl)

					@if(count($tl->loaitin)>0)
                    <li href="#" class="list-group-item menu1">
                    	{{$tl->Ten}}
                    </li>
                   @endif
                    <ul>
                    	@foreach($tl->loaitin as $lt)
                		<li class="list-group-item">
                			<a href="{!!route('get.loaitin',$lt->id)!!}">{{$lt->Ten}}</a>
                		</li>
                		@endforeach
                    </ul>
					
                    @endforeach

                   
                </ul>
            </div>
<!--  -->
