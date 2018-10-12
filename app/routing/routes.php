<?php

$router = new AltoRouter();

// Main routes that non-customers see

//third arg of map "Controllers@contorller's method"
$router->map( 'GET', '/', 'App\Controllers\IndexController@show', 'home' );
$router->map( 'GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'feature_product' );
$router->map( 'GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_product' );
$router->map( 'POST', '/load-more', 'App\Controllers\IndexController@loadMoreProducts', 'load_more_product' );

require_once __DIR__.'/cart.php';
require_once __DIR__.'/auth.php';
require_once __DIR__.'/admin_routes.php';

?>