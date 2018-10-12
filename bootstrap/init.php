<?php
/**
* Start session if not already 
*/
if(!isset($_SESSION)) session_start();

// download environment var
require_once __DIR__.'/../app/config/_env.php';

//instantiate database class
new \App\classes\Database();

//set custom error handler for Whoops
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

require_once __DIR__.'/../app/routing/routes.php';

new \App\RouteDispatcher($router);
?>