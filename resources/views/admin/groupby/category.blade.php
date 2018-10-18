@extends('layouts.app')
@section('title', 'Categories')
@section('data-page-id', 'groupby')

@section('content')

<div class="home">

	<section>
		<div class="display-products" data-token="{{$token}}" id="root">
			<h2>All Categories</h2>

			<div class="grid-x grid-margin-x medium-up-2 large-up-4" data-equalizer data-equalize-on="medium" id="test-eq">
				@foreach($categories as $category)
				<div class="cell medium-4 small-12 large-3">
					<div class="card" data-equalizer-watch>
						<div class="card-section">
							<h2>{{$category->name}}</h2>
						</div>
						<div class="card-section">
							@foreach($subCategories as $subCategory)
							@if($subCategory['category_id'] == $category->id)
							{{-- print all subcategories --}}
							<a href="/subcategory/{{$subCategory->id}}">{{$subCategory->name}}</a>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

</div>
@stop