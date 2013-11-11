<?php

class blogController extends BaseController {


	public function index() {
		$this->registry->template->blog_heading = "this is the blog index";
		$this->registry->template->show('blog_index');
	}

	public function view() {
		/*** fix this ***/

		$this->registry->template->blog_heading = 'This is the blog heading';
		$this->registry->template->blog_content = 'This is the blog content';
		$this->registry->template->show('blog_view');

	}
}

?>