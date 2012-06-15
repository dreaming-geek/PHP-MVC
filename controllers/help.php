<?php

class Help extends Controller {

   function __construct() {
      parent::__construct();
      
	}
	
	function index() {
		$this->view->render('help/index');
	}
   
   /* Bootstrap will call this function if there are arguements after the file is loaded
   * Example: www.example.com/help/other
   */
   public function other($arg = false) {
      
      /* This can be removed. Left it here to remind myself on how to process arguements 
      echo 'We are inside other';  
      echo 'Optional: ' . $arg;
      */
      
      // Here is where we can incorporate models into the framework
      require 'models/help_model.php';
      $model = new Help_Model();
      
   }
   
   

}  