<?php 
$router->map( 'GET', '/product/[i:id]', 'App\Controllers\ProductController@show', 'product' );
$router->map( 'GET', '/product-details/[i:id]', 'App\Controllers\ProductController@get', 'product_details');


$router->map( 'POST', '/cart', 'App\Controllers\CartController@addItem', 'add_item' );
$router->map( 'GET', '/cart', 'App\Controllers\CartController@show', 'view_cart' );
$router->map( 'GET', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items' );
// $router->map( 'POST', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items' );

$router->map( 'POST', '/cart/update-qty', 'App\Controllers\CartController@updateQuantity', 'update_cart_qty' );
$router->map( 'POST', '/cart/remove-item', 'App\Controllers\CartController@removeItem', 'remove_cart_item' );
$router->map( 'POST', '/cart/empty-cart', 'App\Controllers\CartController@emptyItem', 'empty_item' );

$router->map( 'POST', '/cart/payment', 'App\Controllers\CartController@checkout', 'handle_payment' );

?>