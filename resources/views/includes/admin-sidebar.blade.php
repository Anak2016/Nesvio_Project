 
{{-- Side Bar --}}
<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas >

	<!-- <div class = 'off-canbas position-left reveal' id="offCanvas" data-reveal> -->
		<h3>Admin Panel</h3>

		<div class="image-holder text-center">
			<img src="/images/admin.png" alt="Admin's picture" title="Admin">
			<p>{{user()->fullname}}</p>
		</div>
		<!-- Close button -->
		<button class="close-button" aria-label="Close menu" type="button" data-close>
			<!-- <span aria-hidden="true">&times;</span> -->
		</button>

		<!-- Side Bar -->
		<ul class="vertical menu">
			<li><a href="/admin"><i class="fa fa-tachometer fa-fw" aria-hidden="ture"></i>&nbsp; Dashboard</a></li>
			<li><a href="/admin/users"><i class="fa fa-users fa-fw" aria-hidden="ture"></i>&nbsp; Users</a></li>
			<li><a href="/admin/products/create"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Add Product</a></li>
			<li><a href="/admin/products"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp;Manage Proucts</a></li>
			<li><a href="/admin/product/categories"><i class="fa fa-compress" aria-hidden="true"></i>&nbsp; Categories</a></li>
			<li><a href="/admin/orders"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; View Orders</a></li>
			<li><a href="/admin/payments"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Payments</a></li>
			<li><a href="/logout"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp; Logout</a></li>
		</ul>
		<!-- end Side bar  -->
	</div>