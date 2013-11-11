<?php

error_reporting(E_ALL);

$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH', $site_path);

include 'includes/init.php';

/*** load router ***/
$registry->router = new router($registry);

/*** set path untuk controller ***/
$registry->router->setPath(__SITE_PATH . '/controllers');


/*** load template ***/
$registry->template = new template($registry);

/*** load controller ***/
$registry->router->loader();
  
?>