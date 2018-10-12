(function(){
	'use strict';

	ACMESTORE.module= {
		truncateString: function limit(string, value){
			if(string.length > value){
				return string.substring(0, value) + '...';
			}else{
				return string;
			}
		},
		//callback is a callback function
		//use callback this way to work our way around return nested callback function 
		addItemToCart: function(id, callback){
			var token = $('.display-products').data('token');

			if(token == null || !token){
				token = $('.product').data('token');
			}

			//data that will be post to PHP script
			var postData = $.param({product_id: id, token: token});

			//send post request URL which call CartController::addItem (send status message of the request, succeed vs failure) 
			axios.post('/cart', postData).then(function(response){
				console.log(response.data);	
				callback(response.data.success);
			})
		}
	}
})();