
@extends('layouts.app')
@section('title', 'SubcategoryProducts')
@section('data-page-id', 'groupby')

@section('content')

<div class="home">

	<section>
		<div class="display-products" data-token="{{$token}}" id="root">
			<h2>{{$subCategory->name}}</h2>
			<div class="grid-x grid-margin-x medium-up-2 large-up-4" data-equalizer data-equalize-on="medium" id="test-eq">
				<div v-if="products.length > 0" >
					<div class="cell medium-4 small-12 large-3" v-cloak v-for="product in products">
						<a :href="'/product/' + product.id">
							<div class="card" data-equalizer-watch>
								<div  class="card-section">
									<img :src="'/' + product.image_path" width="100%" height="200">
								</div>

								<div class="card-section">
									<p id="subcategoryProduct" data-id="{{$subCategory->id}}">
										@{{stringLimit(product.name, 18)}}
									</p>
									<a :href="'/product/' + product.id" class="button more expanded">
										See More
									</a> 
									<button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart expanded">
										$@{{product.price}} - Add to cart
									</button> 
									<button v-else class="button warning expanded" disable>
										Out of stock
									</button>
								</div >
							</div>
						</a>
					</div>
				</div>
				<div v-else>
					No Product under <strong>{{$subCategory->name}}</strong>
				</div>
				{{-- <h1>No product</h1> --}}
			</div>	
			<div class="text-center">
				{{-- v-show="loading" --}}
				<img v-show="loading" src="/images/loading.gif" style="paddin-bottom:3rem; position:fixed; top:60%; bottom:20%;">
				
			</div>
		</div>

		
	</section>
	
</div>

@stop