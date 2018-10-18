<?php
namespace App\Controllers\Admin;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Redirect;
// use App\Classes\Mail;

class CategoryController extends BaseController
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
		$categories = Category::all();
		$subCategories = SubCategory::all();
		// var_dump($subCategory->name); exit;

		return view('admin/groupby/category', compact('token', 'categories', 'subCategories'));
	}
}
?>