<?php

class Bootstrap {
   
   /*
   *  Loads the url and sends the user to the proper controllers in
   *  the controllers director
   */
   function __construct() {
      $url = isset ($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/');
      $url = filter_var($url, FILTER_SANTIZE_URL); // May need to fix this line
      $url = explode('/', $url);
	  
	  if (empty($url[0])) {
		require 'controllers/index.php';
		$controller = new Index();
		$controller->index();
		return false;
	  }

      $file = 'controllers/' . $url[0] . '.php';
      if (file_exists($file)) {
         require $file; 
      } else {
         $this->error();
        
      }
      
      $controller = new $url[0];
      $controller->loadModel($url[0]);
      /*
      *  Takes care of arguements after the url
      *  Example: example.com/help/other
      *  other is the arguement
      */
      	if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
		
		
	}
	
	function error() {
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}

}