@extends('admin.layout.base')

@section('title', 'Edit User')
@section('data-page-id', 'adminUser')
@section('content')
<div class="add-User">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Edit {{$user->fullname}}</h2> <hr />
		</div>
	</div>

	@include('includes.message')
	
	<form method="post" action="/admin/users/{{$user->id}}/edit" enctype="multipart/form-data">
		<div class="small-12 medium-11">
			<div class="row expanded">
				<div class="row expanded">
					<div class="small-12 medium-6 column">
						<label>Username:
							<input type="text" name="usename" value="{{$user->username}}" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Fullname:
							<input type="text" name="fullname" value="{{$user->fullname}}" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Email:
							<input type="text" name="email" value="{{$user->email}}" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Address:
							<input type="text" name="address" value="{{$user->address}}" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Role:
							{{-- <input type="text" name="role" value="{{$user->role}}"> --}}
							<select name="role">
								<option selected>{{$user->role}}</option>
								@if($user->role != user)
								<option value="user">user</option>
								@else
								<option value="admin">admin</option>
								@endif
							</select>
						</label>
					</div>
					{{-- update User --}}
					<div class="small-12 column">
						<input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
						<input type="hidden" name="user_id" value="{{$user->id}}">

						<input class="button warning float-right" type="submit" value="Update User">
					</div>
				</div>
			</div>
		</div>

	</form>
	
</span>

{{-- delete button  --}}
<div class="row expanded">
	<div class="small-12 medium-11">
		<table data-form="deleteForm">
			<tr style ="border: 1px solid #ffffff !important;">
				<td style="border: 1px solid #ffffff !important; ">
					<form method="POST" action="/admin/users/{{$user->id}}/delete" class="delete-item">
						<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
						<button type="submit" class="button alert">Delete User</button>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
</div>
@include('includes.delete-modal')
@endsection