<?php
namespace App\Classes;

class Redirect
{
	//Redirect to specific page
	public static function to($page)
	{
		header("location:".$page);
	}


	//redirect to same page
	public static function back()
	{
		$uri = $_SERVER['REQUEST_URI'];
		header("location:".$uri);
	}
}

?>