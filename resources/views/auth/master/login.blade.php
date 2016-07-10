

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(Auth::check())
		<h2>Already Loged In</h2>
		<a href="/auth/logout"><button  class="full-width btn-medium">Logout</button></a>
	@else

		{{--<div class="login-social">--}}
			{{--<a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>--}}
			{{--<a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>--}}
		{{--</div>--}}
		{{--<div class="seperator"><label>OR</label></div>--}}
        <h1 class="text-center">
            <a href="/" title="{{$settings->site_name}}">
                <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" />
            </a>
        </h1>
		<form role="form" method="POST" action="/auth/login">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input type="email" name="email" value="{{ old('email') }}" class="input-text full-width" placeholder="email address">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="input-text full-width" placeholder="password">
			</div>
			<div class="form-group">
				<a href="#" class="forgot-password pull-right">Forgot password?</a>
				<div class="checkbox checkbox-inline">
					<label>
						<input type="checkbox" name="remember"> Remember me
					</label>
				</div>
			</div>
			<button type="submit" class="full-width btn-medium">Login</button>
		</form>
		<div class="seperator"></div>
		<p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
	@endif

