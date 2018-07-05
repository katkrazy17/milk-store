<nav class="navbar navbar-default" role="navigation" style="background-color: gray;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color: #fff;" href="{!!URL::to('/')!!}">MILK STORE</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" style="color: #fff;" data-toggle="dropdown">MILK CATEGORIES<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach($loai_sp as $l)
                            <li>
                              <a href="{!!URL::to('laptop/loai',$l->id)!!}">{{$l->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

			</ul>
		 <style>

         </style>
		    <ul class="nav navbar-nav pull-right">
               <li>
                    <a href="{{url('cart')}}" style="color: #fff;"><span class="badge">{!!Cart::count();!!}</span><span class="glyphicon glyphicon-shopping-cart"></span></a>

               </li>
                @if (Auth::guest())
                    <li>
					   <a class="" href="{{url('login')}}" style="color: #fff;">Đăng nhập</a>
					</li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="color: #fff;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" id="dangnhap" aria-labelledby="navbarDropdown">
                        	<a class="dropdown-item" style="color: #fff;" href="{!!URL::to('user')!!}">
                               <p>Thông tin cá nhân</p>
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>

		</div>
	</div>
</nav>
