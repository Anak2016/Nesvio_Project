(function(){
	'use strict';

	ACMESTORE.product.cart = function(){

		var Stripe = StripeCheckout.configure({
			key: $('#properties').data('stripe-key'),
			locale: "auto",
			// image: "" //optional
			token: function(token){
				//$.param will be sent as XHR request.
				var data= $.param({stripeToken: token.id, stripeEmail:token.email});
				//send XHR post request 
				axios.post('/cart/payment', data).then(function(response){
					$(".notify").css("display", "block").delay(4000).slideUp(300).html(response.data.success);
					app.displayItems(200);
				}).catch(function(error){
					console.log(error);
				});
			}
		});

		var app = new Vue({
			el: '#shopping_cart',
			data:{
				items: [],
				cartTotal: 0,
				loading: false,
				fail: false,
				authenticated: false,
				message: '',
				amountInCents: 0
			},
			methods:{
				displayItems: function(){
					this.loading = true;
					axios.get('/cart/items').then(function (response){
						console.log(response.data.items);
						if(response.data.fail){
							app.fail = true;
							app.message = response.data.fail;
							app.loading = false;
						}else{
							app.items = response.data.items;
							app.cartTotal = response.data.cartTotal;
							app.loading = false;
							app.authenticated = response.data.authenticated;
							app.amountInCents = response.data.amountInCents;
						}
					});
				},
				updateQuantity: function(product_id, operator){
					// alert(product_id + " " + operator);
					var postData = $.param({product_id: product_id, operator:operator});
					axios.post('/cart/update-qty', postData).then(function(response){
						//update part of the page that display items on to screen.
						app.displayItems();
					});
				},
				removeItem: function(index){
					var postData = $.param({item_index: index});
					axios.post("/cart/remove-item", postData).then( function(response){
						$(".notify").css("display", "block").delay(4000).slideUp(300) 
							.html(response.data.success);
						app.displayItems();
					});
				},
				emptyCart: function(cart){
					//remove the whole cart
					var postData = $.param({cart:cart});
					axios.post("/cart/empty-cart", postData).then( function(response){
						$(".notify").css("display", "block").delay(4000).slideUp(300) 
							.html(response.data.success);
						app.displayItems();
					});
				},
				checkout: function(){
					// alert('can see');
					Stripe.open({
						name: "Ei-Shop",
						description: "Shopping Cart Items",
						email: $('#properties').data('customer-email'),
						amount: app.amountInCents,
						zipCode:true
					})
				}
			},
			created: function(){
				this.displayItems();
			}
		});
	}

})();