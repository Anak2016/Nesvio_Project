@extends('admin.layout.base')

@section('title', 'Manage Inventory')
@section('data-page-id', 'adminProducts')
@section('content')
<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Product Inventory Item</h2> <hr />
		</div>
	</div>

	@include('includes.message')
	
	{{-- <div class=" column medium-11"> --}}
	<div class="column medium-11 float-left">	
		<a href="/admin/products/create" class="button float-right">
			<i class="fa fa-plus"></i> Add New Product
		</a>
	</div>

	<div class="row expanded">
		<div class="small-12 medium-11 ">
			@if(count($products))
			<table class="hover unstriped" data-form="deleteForm">
				<thead>
					<tr><th>Image</th><th>Name</th><th>Price</th>
						<th>Quantity</th><th>Category</th><th>Subcategory</th>
						<th>Date Created</th><th width="70">Action</th>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>
								<img src="/{{$product['image_path']}}"  alt="{{$product['name']}}"
								height="40" width="40">
							</td>
							<td>{{$product['name']}}</td>
							<td>{{$product['price']}}</td>  
							<td>{{$product['quantity']}}</td>
							<td>{{$product['category_name']}}</td>
							<td>{{$product['sub_category_name']}}</td>

							{{-- Eloquent return date as carbon object so it can call carbon obj's method--}}
							<td>{{$product['added']}}</td>

							<td width="70" class="text-right">

								{{-- Edit button --}}
								<span data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Edit Product">Edit
								<a href="/admin/products/{{$product['id']}}/edit"><i class="fa fa-edit"></i></a>
							</span>
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $links !!}
			@else
			<h2>You have not any products</h2>
			@endif
		</div>
	</div> 
</div>
@endsection