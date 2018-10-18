(function(){
	'use strict';

	ACMESTORE.product.details = function(){
		var app = new Vue({
			el: "#product",
			data:{
				product: [],
				category: [],
				subCategory: [],
				similarProducts: [],
				productId: $('#product').data('id'),
				loading: false
			},
			methods:{
				getProductDetails: function() {
					// I belive that Vue instance is created after url is retreived by post or get
					axios.get('/product-details/' + this.productId).then(
						function(response){
							console.log(response.data.product.image_path);
							app.product = response.data.product;
							app.category = response.data.category;
							app.subCategory = response.data.subCategory;
							app.similarProducts = response.data.similarProducts;
							app.loading = false;
						});
				},
				stringLimit: function(string, value){
					ACMESTORE.module.truncateString(string,value);
				},
				addToCart: function(id){
					// console.log(id);
					ACMESTORE.module.addItemToCart(id, function(message){
						$(".notify").css("display", "block").delay(4000).slideUp(300)
						.html(message);
					});
				}
			},
			created: function() {
				this.getProductDetails();
			}
		});
	}

})();