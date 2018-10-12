<?php
namespace App\Controllers\Admin;

use App\Classes\Session;
use App\Controllers\BaseController;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Redirect;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use App\Models\OrderDetail;
use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardController extends BaseController
{

	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
	}

	public function show()
	{	

		// $orders = Capsule::table('orders')->count(Capsule::raw('DISTINCT order_no'));
		$orders = Order::all()->count();
		$products = Product::all()->count();
		$users = User::all()->count();
		$payments = Payment::all()->sum('amount') / 100; //convert form cents to dollars 
		// var_dump($orders);exit;
		return view('admin/dashboard', compact('orders', 'products', 'payments', 'users'));
	}

	public function getChartData()
	{
		//I gotta learn 
		//raw query with Capsule(ORM ) 
		$revenue = Capsule::table('payments')->select(
			Capsule::raw("sum(amount)/ 100 as 'amount'"),
			Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
			Capsule::raw("YEAR(created_at) year, Month(created_at) month")	
		)->groupby('year', 'month')->get();

		$orders = Capsule::table('orders')->select(
			Capsule::raw("count(id) as 'count'"),
			Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
			Capsule::raw("YEAR(created_at) year, Month(created_at) month")	
		)->groupby('year', 'month')->get();

		echo json_encode([
			'revenues' => $revenue, 'orders' => $orders
		]); exit;
	}
}

?>