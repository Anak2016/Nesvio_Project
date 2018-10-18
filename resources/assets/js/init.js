// (function(){
// 	'use strict'; //enable strict mode which reports error when its occured in our script.

// 	$(document).foundation();


// })();

(function(){
	'use strict';

	$(document).ready(function(){
		//SWITCH PAGES

		switch($("body").data("page-id")){ //data-page-id is unique to every page 
			case 'home':
				ACMESTORE.homeslider.initCarousel();
				ACMESTORE.homeslider.homePageProducts();
				break;
			case 'product':
				ACMESTORE.product.details();
				break;
			case "groupby":
				ACMESTORE.groupby.subCategory();
				// ACMESTORE.homeslider.homePageProducts();
				// ACMESTORE.groupping.Category();
				break;
			case 'cart':
				ACMESTORE.product.cart();
				break;
			case 'adminProduct':
				ACMESTORE.admin.changeEvent();
				ACMESTORE.admin.delete();
				break;
			case 'adminUser':
				ACMESTORE.admin.changeEvent();
				ACMESTORE.admin.delete();
				break;
			case 'adminDashboard':
				ACMESTORE.admin.dashboard();
				break;
			case 'adminCategories':
				ACMESTORE.admin.update();
				ACMESTORE.admin.delete();
				ACMESTORE.admin.create();
				break;
			default:
				//do nothing
		}
	})
})();