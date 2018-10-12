<?php
namespace App\Classes;

//send email to admin when there is an erro, and at the same time send freindly error to the users.
class ErrorHandler
{
	//user this function instead of php error handler
	public function handleErrors($error_number, $error_message, $error_file, $error_line)
	{
		$error = "[{$error_number}] An error occurred in file {$error_file} on line $error_line: $error_message";

		$environment = getenv('APP_ENV');

		if($environment === 'local'){
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
		}else{
			// $data = [
			// 	'to' => getenv('ADMIN_EMAIL'),
			// 	'subject' => 'System error',
			// 	'view' => 'errors',
			// 	'name' => 'Admin',
			// 	'body' => $error
			// ];
			$data = [
				'to' => 'awannaphasch2016@fau.edu', // use awannaphasch2016@fau.edu instead of ADMIN_EMAIL because i dont have real admin email
				'subject' => 'System error',
				'view' => 'errors',
				'name' => 'Admin',
				'body' => $error
			];
			ErrorHandler::emailAdmin($data)->outputFriendlyError();
		}
	}

	// send user freindly error 
	public function outputFriendlyError()
	{
		ob_end_clean();
		view('errors/generic');
		exit;
	}
	
	//send admin the real error
	public static function emailAdmin($data){
		$mail=new Mail;
		$mail->send($data);
		return new static;
	}
}

?>