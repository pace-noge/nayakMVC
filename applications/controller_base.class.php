<?php

Abstract Class BaseController {

	/*** object registry ***/
	protected $registry;

	function __construct($registry) {
		$this->registry = $registry;
	}

	/**
	*semua controller harus ada index method
	*/

	abstract function index();
}

?>