<?php

class Dashboard_Model extends Model {

	public function __construct() {
		parent::__construct();

	}
	
	public function xhrInsert() {
		/* 
		/	This is an ajax call to the database
		/
		/	Sanatize $text
		*/
		$text = $_POST['text'];
		
		$sth = $this->db->prepare('INSERT INTO mvc_data (text) VALUES (:text)');
		$sth->execute(array(':text' => $text));
		
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
	
	}
	
	public function xhrGetListings() {
		// Gets the entries from the ajax call from the database
		$sth = $this->db->query('SELECT * FROM mvc_data');
		// sets the fetch mode so that it only fetches the row data and not the id's
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	
	}
	
	public function xhrDeleteListing() {
	
	$id = $_POST['id'];
	$sth = $this->db->prepare('DELETE FROM mvc_data WHERE id = "'.$id.'"');
	$sth->execute();
	
	}
}	