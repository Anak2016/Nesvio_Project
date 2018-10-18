<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Models\Category;
use App\Models\SubCategory;

use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Controllers\BaseController;

class ProductCategoryController extends BaseController
{
	public $table_name = 'categories';
	public $categories;
	public $subcategories;
	public $subcategories_links;
	public $links;

	public function __construct()
	{
		$total = Category::all()->count();
		$subTotal = SubCategory::all()->count();
		// var_dump($total); exit;
		// var_dump($subTotal); exit;
		$object = new Category;

		list($this->categories, $this->links) = paginate(3, $total, $this->table_name, $object);
		// var_dump($this->links);exit;

		list($this->subcategories, $this->subcategories_links) = paginate(3, $subTotal, 'sub_categories', new SubCategory);	
		// var_dump($this->subcategories_links);exit;
	}
	//dislay category on the page by passing var to view
	public function show()
	{

		// cannot use compact with $this 
		return view('admin/products/categories',[
			'categories' => $this->categories, 'links' => $this->links,
			'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
		]);
	}

	//store 
	public function store()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($request);
			// exit;
			if(CSRFToken::verfityCSRFToken($request->token)){
				$rules =[
					'name' => ['required' => true, 'minLength' => 3, 'string' =>true, 'unique'=> 'categories']
					// 'name' => ['required' => true, 'maxLength' => 5, 'unique'=> 'categories']
				];
				// var_dump($_POST); exit;
				// var_dump($rules); exit;
				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				if($validate->hasError())
				{
					// $error = var_dump($validate->getErrorMessages());
					$errors = $validate->getErrorMessages(); 
					return view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links, 'errors'=> $errors,
						'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links]);
				}

				//create data to be put in database 
				Category::create([
					'name'=> $request->name,
					'slug' => slug($request->name)
				]);

				$total = Category::all()->count();
				$subTotal = SubCategory::all()->count();

				list($this->categories, $this->links) = paginate(3, $total, $this->table_name, $object);	
				list($this->subcategories, $this->subcategories_links) = paginate(3, $subTotal, 'sub_categories', new SubCategory);	
				// var_dump($this->subcategories);exit;
				
				return view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links, 'success'=> "Category Created",
					'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links]);
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	//I messed this one up by accident, come back and fix it
	public function edit($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($request);
			// exit;
			if(CSRFToken::verfityCSRFToken($request->token, false)){
				//update record if ture
				User::where('id',$id)->update(['role'=> $request->role]);
				echo json_encode(['success'=> 'Record Update Successfully']);
				exit;
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function delete($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($request);
			// exit;
			if(CSRFToken::verfityCSRFToken($request->token)){
				//update record if ture
				Category::destroy($id);

				//you can use SQL cascade delete or 
				//use Eloquent SoftDelete(delete_date is set and will not be shown to the screen) 
				$subcategories = SubCategory::where("category_id", $id)->get();
				if(count($subcategories)){
					foreach($subcategories as $subcategory){
						$subcategory->delete();
					}
				}
				Session::add('success','Category Deleted');
				Redirect::to('/admin/product/categories');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}
}

?>	