<?php

/*** class untuk controller ***/
include __SITE_PATH . '/applications/' . 'controller_base.class.php';


/*** include class registry ***/
include __SITE_PATH . '/applications/' . 'registry.class.php';

/*** include class untuk router **/
include __SITE_PATH . '/applications/' . 'router.class.php';

/*** include template class **/
include __SITE_PATH . '/applications/' . 'template.class.php';

/*** autoload models ***/

function __autoload($class_name) {
	$filename = strtolower($class_name) . '.class.php';
	$file = __SITE_PATH . '/models/' . $filename;

	if (file_exists($file) == false) {
		return false;
	}

	include ($file);
}

/*** object registry baru ***/

$registry = new registry;

/*** registry untuk object database ***/
//$registry->db = db::getInstance();

?>