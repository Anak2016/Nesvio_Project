<?php 
$router->map( 'GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard' );
$router->map( 'GET', '/admin/charts', 'App\Controllers\Admin\DashboardController@getChartData', 'admin_dashboard_charts' );



//product management
$router->map( 'GET', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category' );
$router->map( 'POST', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category' );

$router->map( 'POST', '/admin/product/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category' );
$router->map( 'POST', '/admin/product/categories/[i:id]/delete', 'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category' );

//subcategory
$router->map( 'POST', '/admin/product/subcategory/create', 'App\Controllers\Admin\SubCategoryController@store', 'create_subcategory' );
$router->map( 'POST', '/admin/product/subcategory/[i:id]/edit', 'App\Controllers\Admin\SubCategoryController@edit', 'edit_subcategory' );
$router->map( 'POST', '/admin/product/subcategory/[i:id]/delete', 'App\Controllers\Admin\SubCategoryController@delete', 'delete_subcategory' );

//products

//below path should be change from productes to product  
$router->map( 'GET', '/admin/products/[i:id]/selected', 'App\Controllers\Admin\ProductController@getSubcategories', 'selected_category' );


$router->map( 'GET', '/admin/products/create', 'App\Controllers\Admin\ProductController@showCreateProductForm', 'create_product_form' );
$router->map( 'POST', '/admin/products/create', 'App\Controllers\Admin\ProductController@store', 'create_product' );

// only this path should use products not product 
$router->map( 'GET', '/admin/products', 'App\Controllers\Admin\ProductController@show', 'show_products' );


$router->map( 'GET', '/admin/products/[i:id]/edit', 'App\Controllers\Admin\ProductController@showEditProductForm', 'edit_product_form' );
$router->map( 'POST', '/admin/products/edit', 'App\Controllers\Admin\ProductController@edit', 'edit_product' );

//this is product not products because I changed it. (got a little confused and later realised name is not consistent)
$router->map( 'POST', '/admin/product/[i:id]/delete', 'App\Controllers\Admin\ProductController@delete', 'delete_product' );


//users
$router->map( 'GET', '/admin/users', 'App\Controllers\Admin\UserController@show', 'show_user' );

$router->map( 'GET', '/admin/users/create', 'App\Controllers\Admin\UserController@storeCreateUserForm', 'create_user_form' );
$router->map( 'POST', '/admin/users/create', 'App\Controllers\Admin\UserController@store', 'create_user' );


$router->map( 'GET', '/admin/users/[i:id]/edit', 'App\Controllers\Admin\UserController@showEditUserForm', 'edit_user_form' );
$router->map( 'POST', '/admin/users/[i:id]/edit', 'App\Controllers\Admin\UserController@edit', 'edit_user' );

$router->map( 'POST', '/admin/users/[i:id]/delete', 'App\Controllers\Admin\UserController@delete', 'delete_user' );

//sub_category
$router->map('GET', '/subcategory/[i:id]', 'App\Controllers\Admin\SubCategoryController@show', 'show_admin_subcategory' );

//category
$router->map('GET', '/categories', 'App\Controllers\Admin\CategoryController@show', 'show_category' );


$router->map( 'GET', '/admin/orders', 'App\Controllers\Admin\OrderController@show', 'show_orders' );
$router->map( 'GET', '/admin/orders/[a:order_no]', 'App\Controllers\Admin\OrderController@showEditForm', 'show_order_detail' );
$router->map( 'POST', '/admin/orders/[i:id]/delete', 'App\Controllers\Admin\OrderController@delete', 'delete_order' );

$router->map( 'GET', '/admin/payments', 'App\Controllers\Admin\PaymentController@show', 'show_payment' );

?>