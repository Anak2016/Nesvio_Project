<?php
namespace App\Controllers\Admin;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Payment;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Redirect;

use App\Controllers\BaseController;
// use App\Classes\Mail;

class PaymentController extends BaseController	
{
	public $table_name = "payments";
	public $payments;
	public $links;

	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
		
		// $this->payment = Category::all();
		$total = Payment::all()->count();

		list($this->payments , $this->links) = paginate(3, $total, $this->table_name, new Payment);
		// var_dump($this->links); exit;
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$payments = $this->payments;

		$links = $this->links;
		return view('admin/products/payment', compact('token', 'payments', 'links'));
		// return view('admin/products/payment', compact('token', 'payments'));
	}
}
?>