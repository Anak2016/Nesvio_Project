<?php
namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest{
	private static $error =[];
	private static $error_messages = [
		'string' => 'The :attribute field cannot contain numbers',
		'required' => 'The :attribute field is required',
		'minLength' => 'The :attribute field must be a minimum of :policy characters',
		'maxLength' => 'The :attribute field must be a maximum of :policy characters',
		'mixed' => 'The :attribute field can contain letters, number, dash and space only',
		'number' => 'The :attribute field cannot contain letters e.g. 20.0, 20', //this error 
		'email' => 'Email address is not valid',
		'unique' => 'The :attribute field is already taken, please try another one'
	];

	//$dataAndValue = column and value tot validate
	//$policies = the rule that validatoin must satisfy
	public function abide(array $dataAndValue, array $policies)
	{
		foreach($dataAndValue as $column => $value){
			//if $column is a key inside policy
			if(in_array($column, array_keys($policies)))
			{
				self::doValidation(
					[
						'column'=> $column,
						'value' => $value,
						'policies' => $policies[$column]

					]
				);
			}
		}
	}

	//Perform validation for the data probided and set error messages.
	private static function doValidation(array $data)
	{
		$column = $data['column'];
		foreach($data['policies'] as $rule => $policy)
		{
			$valid = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);

			//if not valid, setError
			if(!$valid){
				self::setError(
					str_replace([':attribute', ':policy', '_'],
						[$column, $policy, ' '],
						self::$error_messages[$rule]), $column
				);
			}
		}
	}
	//each table have differnt meaning of policy.
	//policy is rule that if not obey will return false. 

	//column = table's column name
	//value = value to be tested
	//policy = the rule of the test
	//return bool
	protected static function unique($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			// var_dump($column);
			//return false if $column = $value (meaning value already exists)
			return !Capsule::table($policy)->where($column, '=', $value)->exists();
		}
		return true;
	}
	protected static function required($column, $value, $policy)
	{
		return $value !== null && !empty(trim($value));
	}

	protected static function minLength($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			return strlen($value) >= $policy;
		}

		return true;
	}

	protected static function maxLength($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			return strlen($value) <= $policy;
		}
		
		return true;
	}

	protected static function email($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			return filter_var($value, FILTER_VALIDATE_EMAIL);		
		}
		return true;
	}

	static function mixed($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			if(!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $value)){
				return false;
			}
		}

		return true;
	}

	protected static function string($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			if(!preg_match('/^[A-Za-z ]+$/', $value)){
				return false;
			}
		}

		return true;
	}

	protected static function number($column, $value, $policy)
	{
		if($value != null && !empty(trim($value)))
		{
			if(!preg_match('/^[0-9.]+$/', $value)){
				return false;
			}
		}

		return true;
	}

	//set specific error 
	private static function setError($error, $key = null)
	{
		if($key){
			self::$error[$key][] = $error;
		}else{
			self: $error[] = $error;
		}
	}

	//return true if there is validation error
	public function hasError()
	{
		return count(self::$error) > 0 ? true:false;
	}

	//return all validation errors
	public function getErrorMessages()
	{
		return self::$error;
	}
}
?>