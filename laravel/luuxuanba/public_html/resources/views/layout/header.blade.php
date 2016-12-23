 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!!route('trangchu')!!}">Laravel Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('get.about')}}">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="">Liên hệ</a>
                    </li>
                </ul>
                <form action="{{route('post.search')}}" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
			        <div class="form-group">
			          <input type="text" class="form-control" name="key" value="{{ old('key') }}" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Search</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                @if(!isset($user_login))
                    <li>
                        <a href="{!!route('get.register')!!}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{route('get.dangnhap')}}">Đăng nhập</a>
                    </li>
                @else
                    <li>
                    	<a href="{{route('get.user')}}">
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{$user_login->name}}
                    	</a>
                    </li>

                    <li>
                    	<a href="{{route('logout')}}">Đăng xuất</a>
                    </li>
                @endif    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>