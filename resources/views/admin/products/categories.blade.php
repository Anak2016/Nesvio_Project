@extends('admin.layout.base')

@section('title', 'Product Category')
@section('data-page-id', 'adminCategories')
@section('content')
<div class="category">
	<div clss ="grid-x grid-padding-x expanded">
		<div class="medium-11 cell">
			<h2>Product Categories</h2> <hr />
		</div>
	</div>

	@include('includes.message')
	
	{{-- <div class=" column medium-11"> --}}
		<div class="grid-x">

			<div class="small-12 medium-5 float-right cell">
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="input-group-field" placeholder="Search by name">
						<div class="input-group-button">
							<input type="submit" class="button" value="Search">
						</div>
					</div>
				</form>
			</div>
			<div class="small-12 medium-5 float-left cell">
				<form action="/admin/product/categories" method="post">
					<div class="input-group">
						<input type="text" class="input-group-field" name="name" placeholder="Search by name">

						<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">

						<div class="input-group-button">
							<input type="submit" class="button" value="Create">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="grid-x">
			<div class="small-12 medium-11 cell">
				@if(count($categories))
				<table class="hover unstriped" data-form="deleteForm">
					<thead>
						<tr><th>Name</th><th>Slug</th><th>Date Created</th><th width="70">Action</th></tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$category['name']}}</td>
							<td>{{$category['slug']}}</td>
							{{-- Eloquent return date as carbon object so it can call carbon obj's method--}}
							<td>{{$category['added']}}</td>

							<td width="70" class="text-right">

								{{-- Add button --}}
								<span data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Add Subcategory">
								<a data-open="add-subcategory--{{$category['id']}}"><i class="fa fa-plus"></i></a>
							</span>

							{{-- Edit button --}}
							<span data-tooltip aria-haspopup="true" class="has-tip top"
							data-disable-hover="false" tabindex="1"
							title="Edit Category">
							<a data-open="item--{{$category['id']}}"><i class="fa fa-edit"></i></a>
						</span>

						{{-- Delete Category --}}
						<span style="display: inline-block"
						data-tooltip aria-haspopup="true" class="has-tip top"
						data-disable-hover="false" tabindex="1"
						title="Delete Category">
						<form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
							<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
							<button type="submit"><i class="fa fa-times delete"></i></button>
						</form>
					</span>

					{{-- Edit category Modal --}}
					<div class="reveal" id="item--{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
						<div class="notification callout primary"></div>
						<h2>Edit Category</h2>
						<form>
							<div class="input-group">
								<input type="text" id="item-name-{{$category['id']}}" name="name" value="{{$category['name']}}">

								<input type="hidden">
								<div class="input-group-button">
									<input type="submit" class="button update-category" 
									id ="{{$category['id']}}" 
									name="token" 
									data-token="{{ \App\Classes\CSRFToken::_token() }}"
									value="Update">
								</div>
							</div>
						</form>

						<a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</a>
					</div>

					{{-- Add subcategory Modal --}}
					<div class="reveal" id="add-subcategory--{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
						<div class="notification callout primary"></div>
						<h2>Add Subcategory</h2>
						<form>
							<div class="input-group">
								<input type="text" id="subcategory-name-{{$category['id']}}">

								{{-- I am not quite sure what input block below is for --}}
								{{-- <input type="hidden">  --}}

								<div class="input-group-button">
									<input type="submit" class="button add-subcategory" 
									id ="{{$category['id']}}" 
									name="token" 
									data-token="{{ \App\Classes\CSRFToken::_token()}}"
									value="Create">
								</div>
							</div>
						</form>

						<a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</a>
					</div>

				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $links !!}
	@else
	<h2>You have not created any category</h2>
	@endif
</div>
</div> 
</div>
<div class="subcategory">
	<div clss ="grid-x expanded">
		<div class="cell medium-11">	
			<h2>Subcategories</h2> <hr />
		</div>
	</div>
	
	<div class="grid-x grid-padding-x expanded">
		<div class="small-12 medium-11 cell">
			@if(count($subcategories))
			<table class="hover unstriped" data-form="deleteForm">
				<thead>
					<tr><th>Name</th><th>Slug</th><th>Date Created</th><th width="50">Action</th></tr>
				</thead>
				<tbody>
					@foreach($subcategories as $subcategory)
					<tr>
						<td>{{$subcategory['name']}}</td>
						<td>{{$subcategory['slug']}}</td>
						{{-- Eloquent return date as carbon object so it can call carbon obj's method--}}
						<td>{{$subcategory['added']}}</td>

						<td width="50" class="text-right">


							{{-- Edit button --}}
							<span data-tooltip aria-haspopup="true" class="has-tip top"
							data-disable-hover="false" tabindex="1"
							title="Edit Subcategory">
							<a data-open="item-subcategory--{{$subcategory['id']}}"><i class="fa fa-edit"></i></a>
						</span>

						{{-- Delete Category --}}
						<span style="display: inline-block"
						data-tooltip aria-haspopup="true" class="has-tip top"
						data-disable-hover="false" tabindex="1"
						title="Delete Subcategory">
						<form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
							<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
							<button type="submit"><i class="fa fa-times delete"></i></button>
						</form>
					</span>

					{{-- Edit Subcategory Modal --}}
					<div class="reveal" id="item-subcategory--{{$subcategory['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
						<div class="notification callout primary"></div>
						<h2>Edit Subcategory</h2>
						<form>
							<div class="input-group">
								<input type="text" id="item-subcategory-name-{{$subcategory['id']}}" value="{{$subcategory['name']}}">

								<label>Change Category
									<select id="item-category-{{$subcategory['category_id'] }}">
										@foreach(\App\Models\Category::all() as $category)
										@if($category->id == $subcategory['category_id'])
										<option selected="selected" value="{{$category->id}}">
											{{ $category->name}}
										</option>
										@endif
										<option value="{{ $category->id}}">{{ $category->name}} </option>
										@endforeach
									</select>
								</label>

								{{-- <input type="hidden"> --}}
								<div class="input-group-button">
									<input type="submit" class="button update-subcategory" 
									id ="{{$subcategory['id']}}" 
									data-category-id="{{$subcategory['category_id']}}"
									data-test = "{{$subcategory['category_id']}}"
									data-token="{{ \App\Classes\CSRFToken::_token() }}"
									value="Update">
								</div>
							</div>
						</form>

						<a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</a>
					</div>

				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $subcategories_links !!}
	@else
	<h2>You have not created any sub category</h2>
	@endif
</div>
</div> 
@include('includes.delete-modal')
@endsection