<?php

class Login_Model extends Model {

	public function test() {

	}
	
	public function run() {
	
		
		$sth= $this->db->prepare("SELECT id, role FROM mvc_users WHERE login =:login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256', $_POST['password'], HASH_KEY)
		));
		
		// fetch the sql result and puts it into an array
		$data = $sth->fetch();
		
		// $data = $sth->fetchAll();
		$count = $sth->rowCount();
		if ($count > 0) {
		
			// login
			Session::init();
			// the session now has the role access list info for each user
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			header('location: '.URL.'dashboard');
		
		} else {
			// show an error
			header('location: login');
		
		}
	
	}

}	