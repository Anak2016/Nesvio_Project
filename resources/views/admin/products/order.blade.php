@extends('admin.layout.base')

@section('title', 'ProductsOrder')
@section('data-page-id', 'product')
@section('content')

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Orders Information</h2> <hr />
		</div>
	</div>

	@include('includes.message')

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				@if(isset($orders))
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th>
							<th>Date Created</th><th width="70">Action</th>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{$order['order_no']}}</td>
								<td>{{$order['user_id']}}</td>
								<td>{{$order['added']}}</td>

								<td width="70" class="text-right">

									{{-- Edit button --}}
									<span data-tooltip aria-haspopup="true" class="has-tip top"
									data-disable-hover="false" tabindex="1"
									title="order details">Edit
									<a href="/admin/orders/{{$order['order_no']}}"><i class="fa fa-edit"></i></a>
								</span>

								{{-- Delete this User --}}
								<span style="display: inline-block"
								data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Delete Order">
								<form method="POST" action="/admin/orders/{{$order['id']}}/delete" class="delete-item" >
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
				<h2>Users have not ordered.</h2>
				@endif
			</div>
		</div> 
	</div>
	@endsection