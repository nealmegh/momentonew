@extends('auth.layout.auth')

@section('page-title')
	@include('common.page-title', ['PageTitle'=>'User Registration'])
@stop

@section('auth-content')
	<div class="tab-container full-width-style arrow-left dashboard">
		<ul class="tabs">
			<li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Register</a></li>
		</ul>
		<div class="tab-content">
			<div id="dashboard" class="tab-pane fade in active">

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form role="form" method="POST" action="/auth/register">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input  type="text" name="first_name" value="{{ old('first_name') }}" class="input-text full-width" placeholder="first name">
					</div>
					<div class="form-group">
						<input type="email"  name="email" value="{{ old('email') }}" class="input-text full-width" placeholder="email address">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="input-text full-width" placeholder="password">
					</div>
					<div class="form-group">
						<input type="password"  name="password_confirmation" class="input-text full-width" placeholder="confirm password">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Tell me about Momento news
							</label>
						</div>
					</div>
					<div class="form-group">
						<p class="description">By signing up, I agree to Momento's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
					</div>
					<button type="submit" class="full-width btn-medium">SIGNUP</button>
				</form>


			</div>
		</div>
	</div>
@stop