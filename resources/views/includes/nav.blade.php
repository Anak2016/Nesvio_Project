<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<header class="navigation ">

	<div class="hide-for-medium fixed">	
		<div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
			<button class="menu-icon float-right" type="button" data-toggle="main-menu"></button>
			<a href="/" class="float-left small-logo">Nesvio Product</a>
		</div>

		<div class="top-bar" id="main-menu">
			{{-- add the following to display category only when is clicked on 

				data-click-open="true" data-disable-hover="true" data-close-on-click-inside="false"
				
				--}}
			<div class="menu medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown" data-disable-hover="false">

				{{-- hidden when small --}}
				<div class="top-bar-title show-for-medium">
					<a href="/" class="logo">Nesvio Store</a>	
				</div>

				<div class="top-bar-left">
					<ul class="dropdown menu vertical medium-horizontal">
						<li><a href="#">Nesvio Products</a></li>
							@if(count($categories))
								<li>
									<a href="/categories">Categories</a>
									<ul class='menu vertical sub dropdown' style="list-style: none;">
										@foreach($categories as $category)
											<li>
												<a href="#">{{$category->name}}</a>
												@if(count($category->subCategories))
													<ul class="menu sub vertical" style="list-style: none;">
														@foreach($category->subCategories as $subCategory)
															<li>
																{{-- link it to product.blade.php --}}
																{{-- <a href="/product/{{$subCategory->}}"> --}}
																	<a href="/subcategory/{{$subCategory->id}}"></a>
																	{{$subCategory->name}}
																</a>
															</li>
														@endforeach
													</ul>
												@endif
											</li>
										@endforeach
									</ul>
								</li>
							@endif
							
					</ul>
				</div>
				<div class="top-bar-right">
					<ul class="dropdown menu vertical medium-horizontal">
						@if(isAuthenticated())
							<li><a href="#">{{ user()->username }}</a></li>
							<li>
								<a href="/cart">
									Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</a>
							<li>
							<li><a href="#">Orders</a></li>
							<li><a href="/logout">Logout</a><li>
						@else
							<li><a href="/login">Sign In</a></li>
							<li><a href="/register">Register</a><li>
							<li>
								<a href="/cart">
									Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</a>
							<li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="show-for-medium fixed">
		<div class="top-bar" id="example-menu">
		{{-- add the following to display category only when is clicked on 
	
			data-click-open="true" data-disable-hover="true" data-close-on-click-inside="false"
			
			--}}
		<div class="menu medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown" data-disable-hover="false">

			{{-- hidden when small --}}
			<div class="top-bar-title show-for-medium">
				<a href="/" class="logo">Ei-Shop</a>
			</div>

			<div class="top-bar-left">
				<ul class="dropdown menu vertical medium-horizontal">
					<li>Products</li>
					@if(count($categories))
						<li>
							<a href="/categories">Categories</a>
							<ul class='menu vertical sub dropdown' style="list-style: none;">
								@foreach($categories as $category)
									<li>
										<a href="/category/{{$category->id}}">{{$category->name}}</a>
										@if(count($category->subCategories))
											<ul class="menu sub vertical" style="list-style: none;">
												@foreach($category->subCategories as $subCategory)
													<li>
														<a href="/subcategory/{{$subCategory->id}}">
															{{$subCategory->name}}
														</a>
													</li>
												@endforeach
											</ul>
										@endif
									</li>
								@endforeach
							</ul>
						</li>
					@endif
				</ul>
			</div>
			<div class="top-bar-right">
				<ul class="dropdown menu vertical medium-horizontal">
					@if(isAuthenticated())
						<li><a href="#">{{ user()->username }}</a></li>
						<li>
							<a href="/cart">
								Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						<li>
						<li><a href="#">Orders</a></li>
						<li><a href="/logout">Logout</a><li>
					@else
						<li><a href="/login">Sign In</a></li>
						<li><a href="/register">Register</a><li>
						<li>
							<a href="/cart">
								Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						<li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	</div>
</header>