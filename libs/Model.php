<?php

class Model {

	function __construct() {
		// Models usually include a database connection like so:
		// $this->database = new Database();
		
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);


	}

}	