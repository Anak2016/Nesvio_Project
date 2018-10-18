<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Classes\Role;

use App\Controllers\BaseController;

use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;

class SubCategoryController extends BaseController
{
	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
	}

	public function show($id)
	{
		$token = CSRFToken::_token();
		$subCategory = SubCategory::where('id', $id)->first();
		// var_dump($subCategory->name); exit;
		return view('admin/groupby/subcategory', compact('token', 'subCategory'));
	}

	//store 
	public function store()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			$extra_errors= [];
			if(CSRFToken::verfityCSRFToken($request->token, false)){
				$rules =[
					'name' => ['required' => true, 'minLength' => 3, 'string' =>true],
					'category_id' => ['required'=> true]
				];
				// var_dump($_POST); exit;
				// var_dump($rules); exit;
				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				$duplicate_subcategory = SubCategory::where('name' ,$request->name)->where('category_id', $request->category_id)->exists();

				if($duplicate_subcategory){
					$extra_errors['name'] = array('Subcategory already exist.');
				}

				$category = Category::where('id', $request->category_id)->exists();

				if(!$category){
					$extra_errors['name'] = array('Invalid Product Category');
				}

				if($validate->hasError() || $duplicate_subcategory || !$category)
				{
					// $error = var_dump($validate->getErrorMessages());
					$errors = $validate->getErrorMessages(); 
					count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

					header('HTTP/1.1 422 Unprocessable Entity', true , 422);
					echo json_encode($response);
					exit;	
				}
				//create data to be put in database 
				SubCategory::create([
					'name'=> $request->name,
					'category_id' => $request->category_id,
					'slug' => slug($request->name)
				]);
				echo json_encode(['success'=> 'Subcategory create successfully']);
				exit;
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function edit($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');
			$extra_errors= [];

			// var_dump($request); exit;

			if(CSRFToken::verfityCSRFToken($request->token, false)){
				$rules =[
					'name' => ['required' => true, 'minLength' => 3, 'string' =>true],
					'category_id' => ['required'=> true]
				];
				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);
				$duplicate_subcategory = SubCategory::where('name' ,$request->name)->where('category_id', $request->category_id)->exists(); 
				// var_dump($request); exit;
				if($duplicate_subcategory){
					$extra_errors['name'] = array('You have not made any changes');
				}
				// var_dump($request); exit;
				$category = Category::where('id', $request->category_id)->exists();
				// var_dump($request); exit;
				if(!$category){
					$extra_errors['name'] = array('Invalid Product Category'); 
				}
				// var_dump($request); exit;
				if($validate->hasError() || $duplicate_subcategory || !$category)
				{
					// $error = var_dump($validate->getErrorMessages());
					$errors = $validate->getErrorMessages(); 
					count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

					header('HTTP/1.1 422 Unprocessable Entity', true , 422);
					echo json_encode($response);
					exit;	
				}
				// var_dump($request); exit;
				//update record if ture
				SubCategory::where('id',$id)->update(['name'=> $request->name, 'category_id' => $request->category_id]); 
				// var_dump($request); exit;

				echo json_encode(['success'=> 'Subcategory Updated Successfully']);
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
			// var_dump($request); exit;
			if(CSRFToken::verifyCSRFToken($request->token, false)){

				//update record if ture
				SubCategory::destroy($id);
				Session::add('success','SubCategory Deleted');
				Redirect::to('/admin/product/categories');
			}

			throw new \Exception('Token mismatch');
		}
		return null;
	}
}

?>	