@extends('admin.layout.base')

@section('title', 'Dashboard')
@section('data-page-id', 'adminDashboard')

@section('content')
	<div class="dashboard grid-margin-y">
		<div class="grid-x grid-margin-x grid-margin-y" data-equilizer data-equalizer-on="medium">

			{{-- order summary --}}
			<div class="small-12 medium-3 large-3 cell summary" data-equalizer-watch>
				<div class="card">
					<div class="card-section">
						<div class="grid-x">
							<div class="small-3 large-4 cell">
								<i class="fa fa-shopping-cart" cria-hidden="true"></i>
							</div>
							<div class="small-9 large-8 cell">
								<p>Total Orders</p><h4>{{$orders}}</h4>
							</div>	
						</div>
					</div>
					<div class="card-divider">
						<div class="grid-x cell">
							<a href="#">Order Details</a>
						</div>
					</div>
				</div>
			</div>
			{{-- stock summary --}}
			<div class="small-12 medium-3 cell summary" data-equalizer-watch>
				<div class="card">
					<div class="card-section">
						<div class="grid-x">
							<div class="small-3 cell">
								<i class="fa fa-thermometer-empty" cria-hidden="true"></i>
							</div>
							<div class="small-9 cell">
								<p>Stock</p><h4>{{$products}}</h4>
							</div>
						</div>
					</div>
					<div class="card-divider">
						<div class="grid-x cell">
							<a href="/admin/products">View Products</a>
						</div>
					</div>
				</div>
			</div>
			{{-- Revenue summary --}}
			<div class="small-12 medium-3 cell summary" data-equalizer-watch>
				<div class="card">
					<div class="card-section">
						<div class="grid-x">
							<div class="small-3 cell">
								<i class="fa fa-money" cria-hidden="true"></i>
							</div>
							<div class="small-9 cell">
								<p>Revenue</p><h4>${{number_format($payments,2)}}</h4>
							</div>
						</div>
					</div>
					<div class="card-divider">
						<div class="grid-x cell">
							<a href="#">Payment Details</a>
						</div>
					</div>
				</div>
			</div>
			{{-- Signup summary --}}
			<div class="small-12 medium-3 cell summary" data-equalizer-watch>
				<div class="card">
					<div class="card-section">
						<div class="grid-x">
							<div class="small-3 cell">
								<i class="fa fa-users" cria-hidden="true"></i>
							</div>
							<div class="small-9 cell">
								<p>Sign up</p><h4>{{$users}}</h4>
							</div>
						</div>
					</div>
					<div class="card-divider">
						<div class="grid-x cell">
							<a href="#">Register Users</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="grid-x grid-margin-x grid-margin-y graph">
			<div class="small-12 medium-6 cell monthly-sales">
				<div class="card">
					<div class="card-section">
						<h4>Monthly Orders</h4>
						<canvas id="order"></canvas>
					</div>
				</div>
			</div>
			<div class="small-12 medium-6 cell monthly-revenue">
				<div class="card">
					<div class="card-section">
						<h4>Monthly Revenue</h4>
						<canvas id="revenue"></canvas>
					</div>
				</div>
			</div>
		</div>
@endsection