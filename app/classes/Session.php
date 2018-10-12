<?php
namespace App\Classes;



class Session
{
	//create a session
	public static function add($name, $value)
	{
		// echo "in function add";

		if($name !='' && !empty($name) && $value != '' && !empty($value)){
			// echo "1 ";
			return $_SESSION[$name] = $value;
		}

		// echo "0";
		//throw exception if value is not defined or empty
		throw new \Exception('Name and value required');
	}
	//get value from session
	public static function get($name)
	{
		return $_SESSION[$name];
	}

	//check is session exists
	public static function has($name)
	{
		if($name != '' && !empty($name))
		{
			return (isset($_SESSION[$name])) ?true:false;
		}
		return (isset($_SESSION[$name])) ?true:false;
		// throw new \Exception("The field is undefined."); 

	}

	//remove session
	public static function remove($name)
	{
		if(self::has($name)){
			unset($_SESSION[$name]);
		}
	}

	//flash a message and unset old session
	public static function flash($name,$value = '')
	{
		if(self::has($name))
		{
			$old_value = self::get($name);
			self::remove($name);

			return $old_value;
		}else{
			self::add($name, $value);
		}
		return null;
	}
}

?>