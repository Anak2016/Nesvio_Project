<?php
namespace App\Classes;

class Request
{
	//return array of all request that we are interested in 
	public static function all($is_array = false)
	{
		$result = [];
		if(count($_GET) >0 ) $result['get'] = $_GET;
		if(count($_POST) >0 ) $result['post'] = $_POST;
		//HTTP File Upload Variables
		$result['file'] = $_FILES;

		//if $is_array is true, convert to array
		//if $is_array is false, convert to objesct(stdClass)
		// use $is_array so value can be set to true/false which will convert to array/obj
		return json_decode(json_encode($result), $is_array);
	}
	//get specific request type
	public static function get($key)
	{
		$object = new static;
		$data = $object->all();

		return $data->$key;
	}
	//check request availability
	public static function has($key)
	{
		return (array_key_exists($key, self::all(true)))? true: false;
	}

	//Already existed data in JSON format
	//(called 'old' because data is already exist hence 'old')
	//another word, it represent newly added input data. if not set return empty, if set return input value.
	public static function old($key, $value)
	{
		$object = new static;
		$data = $object->all();

		// var_dump($data);exit;
		

		//create $key obj on the fly thay contain $value?? //value that get post in view
		//or get value from request eg post, get request.
		return isset($data->$key->$value) ? $data->$key->$value : ''; 
	}
	//refresh request
	public static function refresh()
	{
		$_POST =[];
		$_GET = [];
		$_FILES = [];
	}
}
?>