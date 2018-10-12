<?php
namespace App;

use AltoRouter;
class RouteDispatcher
{
	protected $match;
	protected $controller; //controllers in controller folder
	protected $method; // methods of controllers.

	public function __construct(AltoRouter $router)
	{
		// echo "in RouteDispatcher constructor";
		$this->match = $router->match();
		if($this->match)
		{
			//target is an element within match args
			list($controller,$method) = explode('@', $this->match['target']);
			$this->controller = $controller;
			$this->method = $method;

			if(is_callable(array(new $this->controller, $this->method))){
				//call_user_func_arry verify that method exist and can be called then call method if it is verified 
				call_user_func_array(array(new $this->controller, $this->method),array($this->match['params']));
			}else{
				echo "The method {$this->method} is not defined in {$this->controller}";
			}
		}else{
			header($_SERVER['SERVER_PROTOCOL'].'404 Not Found');
			//using view with altorouter. which has different syntax when compared to manually creating Route class which first get url and then return view
			view('errors/404');
		}
		
	}
}


?>