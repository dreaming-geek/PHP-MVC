<?php

class Dashboard extends Controller {

   function __construct() {
      parent::__construct();
      // The :: is calling a static function
      Session::init();
      $logged = Session::get('loggedIn');
      if ($logged == false) {
      	Session::destroy();
      	header('location: login');
      	exit;
      
      }
      // Example way of loading js files onto each page/controller/view
	  $this->view->js = array('dashboard/js/default.js');
	  
	}
	
	function index() {
		// To load the view without header.php and footer.php put in the line below
      	// $this->view->render('index/index', 1);
	  	$this->view->render('dashboard/index');	
	}
	
	function logout() {
	
		Session::destroy();
		header('location: '.URL.'login');
      	exit;
	
	}
	
	function xhrInsert() {
		$this->model->xhrInsert();
	
	}
	
	function xhrGetListings() {
		$this->model->xhrGetListings();
	
	}
	
	function xhrDeleteListing() {
		$this->model->xhrDeleteListing();
	
	}

}