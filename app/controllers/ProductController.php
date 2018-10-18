<?php
namespace App\Controllers;

use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Redirect;
// use App\Classes\Mail;

class ProductController extends BaseController
{
	public function __construct()
	{		
		// if(!Role::middleware('user')){
		// 	Redirect::to('/login');
		// }
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$product = Product::where('id', $id)->first();

		// var_dump($product); exit;
		return view('product', compact('token', 'product'));
	}

	public function get($id)
	{
		$product = Product::where('id', $id)->with(['category','subCategory'])->first();

		// var_dump($product->subCategory); exit;	
		if($product){
			$similar_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->inRandomOrder()->limit(8)->get();
		}

		if($product){
			echo json_encode([
				'product' => $product, 'category' =>$product->category,
				'subCategory' => $product->subCategory, 'similarProducts' => $similar_products	
			]);
			// var_dump($product->subCategory); exit;	
			exit;
		}
		header('HTTP/1.1 422 Uprocessable Entity', true, 422);
		echo 'Product not found';
		exit;
	}
}
?>