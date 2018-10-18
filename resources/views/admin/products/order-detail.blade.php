@extends('admin.layout.base')

@section('title', 'ProductsOrderDetail')
@section('data-page-id', 'product')
@section('content')

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>OrdersDetail</h2> <hr />
		</div>
	</div>

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				@if(isset($orderDetail) && count($orderDetail) >0)
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th><th>Product_id</th>
							<th>Unit_price</th><th>quantity</th><th>total</th><th>status</th>
							<th>Date Created</th>
						</thead>
						<tbody>
							@foreach($orderDetail as $order)
							<tr>
								<td>{{$order['order_no']}}</td>
								<td>{{$order['user_id']}}</td>
								<td>{{$order['product_id']}}</td>
								<td>{{$order['unit_price']}}</td>
								<td>{{$order['quantity']}}</td>
								<td>{{$order['total']}}</td>
								<td>{{$order['status']}}</td>
								<td>{{$order['added']}}</td>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $links !!}
				@else
				<h2>this order does not exist.</h2>
				@endif
			</div>
		</div> 
	</div>
	@endsection