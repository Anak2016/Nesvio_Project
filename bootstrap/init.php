<?php
/**
* Start session if not already 
*/
if(!isset($_SESSION)) session_start();

// download environment var
require_once __DIR__.'/../app/config/_env.php';

?>