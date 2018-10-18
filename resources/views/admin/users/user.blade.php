@extends('admin.layout.base')

@section('title', 'Users')
@section('data-page-id', 'adminUsers')
@section('content')
<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Users Information</h2> <hr />
		</div>
	</div>

	@include('includes.message')
	
	{{-- <div class=" column medium-11"> --}}
		<div class="column medium-11 float-left">	
			<a href="/admin/users/create" class="button float-right">
				<i class="fa fa-plus"></i> Add New Users
			</a>
		</div>

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				@if(isset($users))
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Username</th><th>Full name</th><th>Email</th>
							<th>Password</th><th>address</th><th>role</th>
							<th>Date Created</th><th width="70">Action</th>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$user['username']}}</td>
								<td>{{$user['fullname']}}</td>
								<td>{{$user['email']}}</td>
								<td>{{$user['password']}}</td>
								<td>{{$user['address']}}</td>
								<td>{{$user['role']}}</td>
								{{-- dated created --}}
								<td>{{$user['added']}}</td>

								<td width="70" class="text-right">

									{{-- Edit button --}}
									<span data-tooltip aria-haspopup="true" class="has-tip top"
									data-disable-hover="false" tabindex="1"
									title="Edit Product">Edit
									<a href="/admin/users/{{$user['id']}}/edit"><i class="fa fa-edit"></i></a>
								</span>

								{{-- Delete this User --}}
								<span style="display: inline-block"
								data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Delete Category">
								<form method="POST" action="/admin/users/{{$user['id']}}/delete" class="delete-item" >
									<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
									<button type="submit"><i class="fa fa-times delete"></i></button>
								</form>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $links !!}
				@else
				<h2>No users have registered.</h2>
				@endif
			</div>
		</div> 
	</div>
	@endsection