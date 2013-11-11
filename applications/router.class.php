<?php

class Router {

	private $registry;
	private $path;
	private $args = array();
	public $file;
	public $controller;
	public $action;

	function __construct($registry) {
		$this->registry = $registry;
	}

	function setPath($path) {
		if (is_dir($path) == false) {
			throw new Exception ('path controller invalid: `' . $path . '`');
		}
		$this->path = $path;
	}

	/**
	*load controller
	*/

	public function loader() {
		/** cek route **/
		$this->getController();

		if (is_readable($this->file) == false) {
			$this->file = $this->path.'/error404.php';
			$this->controller = 'error404';
		}

		include $this->file;

		/*** instance baru untuk controller ***/
		$class = $this->controller . 'Controller';
		$controller = new $class($this->registry);

		/*** cek action callable ***/
		if (is_callable(array($controller, $this->action)) == false) {
			$action = 'index';
		} else {
			$action = $this->action;
		}

		$controller->$action();
	}

	private function getController() {

		/*** ambil route dari url ***/
		$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

		if (empty($route)) {
			$route = 'index';
		} else {

			/*** ambil part dari route ***/
			$parts = explode('/', $route);
			$this->controller = $parts[0];
			if(isset( $parts[1])) {
				$this->action = $parts[1];
			}
		}

		if (empty($this->controller)) {
			$this->controller = 'index';
		}

		/*** get action ***/

		if(empty($this->action)) {
			$this->action = 'index';
		}

		/*** set path file ***/
		$this->file = $this->path .'/'. $this->controller . 'Controller.php';
	}
}

?>