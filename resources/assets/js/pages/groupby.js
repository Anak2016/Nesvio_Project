(function(){
	'use strict';

	ACMESTORE.groupby.subCategory = function(){
		// console.log($('#subcategoryProduct').data('id'));
		var app = new Vue({
			el:'#root',
			data: {
				products: [],
				count: 0,
				total: 0,
				subCategoryId: $('#subcategoryProduct').data('id'),
				// subCategoryId: 35,
				loading: false
			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getSubcategoryProducts: function(){
				this.loading = true;

				axios.get('/subcategory-products/'+ this.subCategoryId ).then(function (response){
						app.products = response.data.products;
						app.total = response.data.total;
						app.loading = false;
						console.log(app.products.length);
						console.log(app.total);
						
					});
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
				loadMoreSubcategoryProducts: function(){
					var token = $('.display-products').data('token');
					this.loading =true;
					// we use jQuery here becuase axios pass all javascript object to JSON 
					//but php scripts only understand encoded format which can be done by using jQuery
					var data= $.param({next:2, token: token, count:app.count});
					axios.post('/load-more-subcategory',data)
					.then(function(response){
						app.products = response.data.products;
						app.count = response.data.count;
						app.loading = false;
					});
				}
			},
			created: function(){
				// console.log("first");
				this.getSubcategoryProducts(); 
			}
		});
	}

})();