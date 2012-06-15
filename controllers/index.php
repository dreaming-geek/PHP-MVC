<?php

class Index extends Controller {

   function __construct() {
      parent::__construct();
      
	}
	
	function index() {
		//echo Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
		// To load the view without header.php and footer.php put in the line below
      	// $this->view->render('index/index', 1);
	  	$this->view->render('index/index');	
	}

}  