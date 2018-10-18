@extends('admin.layout.base')
@section('title', 'Create User')
@section('data-page-id', 'adminUser')

@section('content')
{{-- use Vue.js here, but we can use php to do it like usual --}}
<div class="auth"  id="auth" >
	<section class="register_form">
		<div class="grid-x align-center">
			<div class="small-12 medium-7 medium-centered">
				<h2 class="text-center">Create Account</h2>
				@include('includes.message')

				<form action="/admin/users/create" method="post">

					<input type="text" name="fullname" placeholder="Fullname"
					value="{{\App\Classes\Request::old('post', 'fullname')}}">

					<input type="text" name="email" placeholder="Email Address"
					value="{{\App\Classes\Request::old('post', 'email')}}">

					<input type="text" name="username" placeholder="Username"
					value="{{\App\Classes\Request::old('post', 'username')}}">

					<input type="text" name="password" placeholder="Password"
					value="{{\App\Classes\Request::old('post', 'password')}}">

					<div class="small-12 medium-6 cell">
						<label>Role:
							<select name="role">
								<option value="" selected>You haven't selected</option>
								<option value="user">user</option>
								<option value="admin">admin</option>
							</select>
						</label>
					</div>

					<textarea name="address" placeholder="Your Address">{{\App\Classes\Request::old('post', 'address')}}</textarea>
					<input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
					<button class="button float-center">Register User</button>
				</form>

			</div>
		</div>
	</section>
</div>

@stop