<?php

class indexController extends BaseController {
	public function index() {
		/*** set variabel template ***/
		$this->registry->template->welcome = 'Welcome to PHP mvc';

		/*** load template index ***/
		$this->registry->template->show('index');
	}
}

?>