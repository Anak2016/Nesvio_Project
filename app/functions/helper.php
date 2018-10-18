<?php
use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\User;
use App\Classes\Session;
// function view($path, array $data = [])
// {
// 	$view = __DIR__.'/../../resources/views';
// 	$view = __DIR__.'/../../bootstrap/cache';

// 	$blade = new Blade($view, $cache);
// 	echo $blade->view()->make($path, $data)->render();
// }
function view($path, array $data = [])
{
	$view = __DIR__ . '/../../resources/views';
	$cache = __DIR__ . '/../../bootstrap/cache';

	$blade = new Blade($view, $cache);
	echo $blade->view()->make($path, $data)->render();
}

//helper function for Mail::send
function make($filename, $data)
{
	extract($data); // $data arg is subbed as $data['body']; when make is called from Mail.php 

	//it only wants to include views/$filename.php only when function make is called.
	ob_start();

	//include template

	include(__DIR__.'/../../resources/views/emails/'.$filename.'.php');
	//get content of the file
	$content = ob_get_contents();

	ob_end_clean();

	return $content;

}

function slug($value){
	//remove all character not in this list:underscore | letters | numbers |whitespaces
	$value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

	//remove underscore and whitespace with a dash
	$value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

	//remove whitespace
	return trim($value, '-');
}

function paginate($num_of_records, $total_record, $table_name, $object)
{
	$categories = [];
	// $object = new Category;	

	$pages = new Paginator($num_of_records, 'p');
	// var_dump($total_record);exit;	
	$pages->set_total($total_record);

	// eloquent query use SoftDelete on deleted_at.
	//here we use raw query we must specify that deleted_at is null
	$data = Capsule::select("SELECT *FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC".$pages->get_limit());
	//transform data from object to array 
	$categories = $object->transform($data);

	return [$categories, $pages->page_links()];
}

function isAuthenticated()
{
	// var_dump(Session::has('SESSION_USER_NAMdE') ? true : false);exit;
	return Session::has('SESSION_USER_NAME') ? true : false;
}

function user()
{
	if(isAuthenticated()){
		return User::findOrFail(Session::get('SESSION_USER_ID'));
	}
	return false;
}

function convertMoneyToCents($value)
{
	$value = preg_replace("/\,/i","", $value);
	$value = preg_replace("/([^0-9\.\-])/i","", $value);

	if(!is_numeric($value)){
		return 0.00;
	}
	$value = (float) $value;
	return round($value,2) *100;
}

?>