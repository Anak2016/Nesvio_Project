<?php
namespace App\Controllers\Admin;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Redirect;
use App\Classes\Session;

use App\Controllers\BaseController;
// use App\Classes\Mail;

class OrderController extends BaseController
{

	public $table_name = "orders";
	public $links;
	public $orders;

	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
		
		// $this->payment = Category::all();
		$total = Order::all()->count();

		list($this->orders , $this->links) = paginate(3, $total, $this->table_name, new Order);
		// var_dump($this->links); exit;
	}
	public function show()
	{
		$token = CSRFToken::_token();
		// $orders = Order::all();
		$orders = $this->orders;
		$links = $this->links;
		// var_dump($orders); exit;
		return view('admin/products/order', compact('token', 'orders', 'links'));
	}
	public function showEditForm($order_no)	//id = order_no
	{
		$token = CSRFToken::_token();
		$orderDetail = OrderDetail::where('order_no',$order_no)->get();

		// var_dump(count($orderDetail)); exit;
		// var_dump($orderDetail); exit;
		return view('admin/products/order-detail', compact('token', 'orderDetail'));
	}

	public function delete($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				//update record if ture
				Order::destroy($id);

				Session::add('success','Order Deleted');
				Redirect::to('/admin/orders');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}
}
?>