<?php
namespace App\Controllers;

use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
// use App\Classes\Mail;

class IndexController extends BaseController
{
	public function show()
	{
		// var_dump($products->first()->image_path); exit;
		$token = CSRFToken::_token();
		return view('home', compact('token'));
	}

	public function featuredProducts()
	{
		$products = Product::where('featured',1)->inRandomOrder()->limit(4)->get();
		// var_dump($products); exit;
		echo json_encode(['featured' => $products, 'count' =>count($products)]);
	}

	public function getProducts()
	{
		$products = Product::where('featured', 0)->skip(0)->take(2)->get();
		echo json_encode(['products' => $products]);
	}

	public function subcategoryProducts($id)
	{
		$products = Product::where('sub_category_id', $id)->inRandomOrder()->limit(4)->get();
		//want to coutn all product that has sub_category_id = $id
		$total = Product::where('sub_category_id', $id)->count();//wrongly use of all()
		// var_dump($total); exit;	
		echo json_encode(['products' => $products, 'count' =>count($products), 'total'=> $total]);
	}

	public function loadMoreProducts()
	{
		$request = Request::get('post');

		if(CSRFToken::verifyCSRFToken($request->token, false)){
			$count = $request->count;
			$item_per_page = $count +$request->next;
			$products = Product::where('featured', 0)->skip(0)->take($item_per_page)->get();
			echo json_encode(['products'=> $products, 'count' =>count($products)]);
		}
	}
	public function loadMoreSubcategoryProducts()
	{
		$request = Request::get('post');

		if(CSRFToken::verifyCSRFToken($request->token, false)){
			$count = $request->count;
			$item_per_page = $count +$request->next;
			$products = Product::where('sub_category_id', $id)->skip(0)->take($item_per_page)->get();
			echo json_encode(['products'=> $products, 'count' =>count($products)]);
		}
	}
	// for sending confirmation email whne register
	// public function sentmail(){
	// 	echo "Inside Homepage from controller class";
	// 	$mail = new Mail();

	// 	$data = [
	// 		'to' => 'awannaphasch2016@fau.edu',
	// 		'subject' => 'Welcome to Nesvio Store',
	// 		'view' => 'welcome',
	// 		'name' => 'John Doe',
	// 		'body' => 'Testing email template'
	// 	];
	// 		// var_dump($data);
	// 		// var_dump((array)$mail->setup());
	// 	if($mail->send($data)){
	// 		echo "Email sent successfully";
	// 	}else{
	// 		echo "Email sent failed";
	// 	}
	// }
}
?>