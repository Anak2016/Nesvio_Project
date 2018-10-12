(function(){
	'use strict';

	ACMESTORE.homeslider.homePageProducts = function(){
		var app = new Vue({
			el:'#root',
			data: {
				featured:[],
				products: [],
				count: 0,
				loading: false
			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){
				this.loading = true;

				axios.all(
					[
					axios.get('/featured'), axios.get('/get-products')
					]
					).then(axios.spread(function(featuredResponse, productsRensponse){
						app.featured = featuredResponse.data.featured;
						app.products = productsRensponse.data.products;
						app.count = productsRensponse.data.count;
						app.loading = false;
					}));
				},
				stringLimit: function(string, value){
					ACMESTORE.module.truncateString(string,value);
				},
				addToCart: function(id){
					ACMESTORE.module.addItemToCart(id, function(message){
						$(".notify").css("display", "block").delay(4000).slideUp(300)
							.html(message);
					});
				},
				loadMoreProducts: function(){
					var token = $('.display-products').data('token');
					this.loading =true;
					// we use jQuery here becuase axios pass all javascript object to JSON 
					//but php scripts only understand encoded format which can be done by using jQuery
					var data= $.param({next:2, token: token, count:app.count});
					axios.post('/load-more',data)
					.then(function(response){
						app.products = response.data.products;
						app.count = response.data.count;
						app.loading = false;
					});
				}
			},
			created: function(){ //what will happen after Vue instance has been created (think of it as constructor)
				console.log("first");
				this.getFeaturedProducts(); 
			},
			mounted: function(){ //after Vue finsihed loaded.
				$(window).scroll(function(){

					if($(window).scrollTop() + $(window).height() +1 > $(document).height()){
						app.loadMoreProducts();
					}
				})
			}
		});
	}
})();