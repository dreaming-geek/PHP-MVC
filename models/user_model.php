<?php

class User_Model extends Model {

	public function __construct() {
		parent::__construct();
	
	}
	
	public function userList() {
	
		$sth = $this->db->prepare('SELECT id, login, role FROM mvc_users');
		$sth->execute();
		// returns the results in an array to the controller so that it can be displayed on the view
		return $sth->fetchAll();
		
	}
	
	public function usersinglelist($id) {
	
		$sth = $this->db->prepare('SELECT id, login, role FROM mvc_users WHERE id = :id');
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	
	}
	
	public function create($data) {
	
		$this->db->insert('mvc_users', array(
			'login' => $data['login'],
			'password' => Hash::create('md5', $data['password'], HASH_KEY),
			'role' => $data['role']
		));
		/*
		$sth = $this->db->prepare('INSERT INTO mvc_users (`login`, `password`, `role`) VALUES (:login, :password, :role)');
		$sth->execute(array(
			':login' => $data['login'],
			':password' => Hash::create('md5', $data['password'], HASH_KEY),
			':role' => $data['role']
		));
		*/
		header('location: ' . URL . 'user');
	}
	
	public function delete($id) {
	
		$sth = $this->db->prepare('DELETE FROM mvc_users WHERE id = :id');
		$sth->execute(array(
			':id' => $id
			));
	}
	
	public function editSave($data) {
		
		$postData = array(
			'login' => $data['login'],
			'password' => Hash::create('md5', $data['password'], HASH_KEY),
			'role' => $data['role']
			);
		
		$this->db->update('mvc_users', $postData, "`id` = {$data['id']}");
		
		/*
		$sth = $this->db->prepare('UPDATE mvc_users SET `login` = :login, `password` = :password, `role` = :role WHERE id = :id');
		$sth->execute(array(
			':login' => $data['login'],
			':password' => Hash::create('md5', $data['password'], HASH_KEY),
			':role' => $data['role'],
			':id' => $data['id']
		));
		*/
		header('location: ' . URL . 'user');
	}
	
}	