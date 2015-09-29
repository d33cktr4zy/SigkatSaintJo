<div class="row vertical-center" id="top-nav">
	<div class="col-xs-5">
		<!-- decide login or not -->
		<div id="sessionNote" class="">
			@if(Auth::check())
					<!-- Loggedin -->

			<p>Hi, <a href="{!! route('profile') !!}">{!! Auth::user()->nama_depan !!} {!! Auth::user()->nama_belakang !!}</a>!! |
				<a href="{!! url('logout') !!}">Logout</a>

			{{--Admin Check--}}
				@if(Auth::user()->user_level == 1)
					&nbsp; <a href="#">Manajemen Situs</a>
				@endif
			</p>
			@else
					<!-- Not Logged in-->
			<a href="{!! url('login') !!}">Login</a> / <a href="{!! action('UserController@getRegistrationForm') !!}">Daftar</a>
			@endif
		</div>
	</div>
</div>