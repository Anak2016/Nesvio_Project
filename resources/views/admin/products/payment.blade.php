@extends('admin.layout.base')

@section('title', 'ProductPayment')
@section('data-page-id', 'product')
@section('content')

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Order Payment</h2> <hr />
		</div>
	</div>
		<div class="row expanded">
			<div class="small-12 medium-11 ">
				@if(isset($payments) && count($payments) >0)
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th><th>total</th><th>status</th>
							<th>Date Created</th>
						</thead>
						<tbody>
							@foreach($payments as $payment)
							<tr>
								<td>{{$payment['order_no']}}</td>
								<td>{{$payment['user_id']}}</td>
								<td>{{$payment['amount']}}</td>
								<td>{{$payment['status']}}</td>
								<td>{{$payment['added']}}</td>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $links !!}
				@else
				<h2>No payment have been processed</h2>
				@endif
			</div>
		</div> 
	</div>
	@endsection