<?php
namespace App\Classes;

//send CSRFToken along with important request eg. credit card number related request


Class CSRFToken
{
	//generate token
	public static function _token()
	{
		
		//if no Session Token, set token
		if(!Session::has('token')){
			$randomToken = base64_encode(openssl_random_pseudo_bytes(32));
			Session::add('token', $randomToken);
		}

		return Session::get('token');
	}

	//verify token
	// public static function verfityCSRFToken($requestToken, $regenerate = true)
	 public static function verifyCSRFToken($requestToken, $regenerate = true)
	{
		// var_dump(Session::has('token')&& Session::get('token')=== $requestToken); exit;
		if(Session::has('token')&& Session::get('token')=== $requestToken)
		{
			if($regenerate){
				Session::remove('token');
			}
			// var_dump("true"); exit;
			return true;
		}
		// var_dump("false"); exit;
		return false;
	}
}

?>
