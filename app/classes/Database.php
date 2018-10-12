<?php
namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule; 
class Database{
	public function __construct()
	{
		//setting for illuminate orm for database
		$db = new Capsule;
		$db->addConnection([
			'driver' => getenv('DB_DRIVER'),
			'host' => getenv('HOST'),
			'database' => getenv('DB_NAME'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD'),
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => ''
		]);
	
		$db->setAsGlobal();
		//bootEloquent() = Bootstrap Eloquent so it is ready for usage
		$db->bootEloquent();
	}
}
?>