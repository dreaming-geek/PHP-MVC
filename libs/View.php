<?php

class View extends Controller {

   function __construct() {
      // echo 'This is the view';

	}
   
   // By default header.php and footer.php will be included
   // If you wanted a certain page to not include header.php or footer.php. In the controller the last argument for render should be 1 (Example in controllers/index.php)
   public function render($name, $noInclude = false) {
      
	  if ($noInclude == true) {
		require 'views/' . $name . '.php';
	  } else {
		// Put this line here because every page will need it so that it does not have to be duplicated on every page.
	  require  'views/header.php'; 
      require 'views/' . $name . '.php';
      require  'views/footer.php';
	  }
	  
   }

}  