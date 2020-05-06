<?php
	class User extends CI_Model {

		private $dni;
		private $name;
		private $surname;
		private $password;
		private $email;
		private $phone;
		private $active;


		public function __construct() {
			$this->dni = '';
			$this->name = '';
			$this->surname = '';
			$this->password = '';
			$this->email = '';
			$this->phone = '';
			$this->active = '';
			
			
			$this->load->database('capabankuth');	
		}

		public function getDNI() {
			return $this->dni;
		}

		public function getName() {
			return $this->name;
		}

		public function getSurname() {
			return $this->surname;
		}

		public function getPassword() {
			return $this->password;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getPhone() {
			return $this->phone;
		}

		public function getActive(){
			return $this->active;
		}

		public function getUser($dni) {

			$condition = array('username' => $dni);
			$query = $this->db->get_where('users', $condition);


			if($query->num_rows() != 1) return null;
			else return $this->createUserFromRawObject($query->result()[0]);
		}

		public function getUsers() {
			
			$query = $this->db->get('users'); 
			$users = [];
			foreach($query->result() as $data) {
				$user = $this->createUserFromRawObject($data);
				array_push($users, $user);
			}

			return $users;
		}

		public function addNewUser($dni, $name, $surname,$password,$email,$phone,$active) {
			$data = array(
				'username' => $dni,
				'first_name' => $name,
				'last_name' => $surname,	
				'password' => $password,
				'email' => $email,
				'phone' => $phone,
				'active' => $active
			
			);
			$this->db->insert('users', $data);
		}

		

		public function checkClientEmail($email) {
			$data = array('email' => $email);
			$query = $this->db->get_where('username', $data);
			if($query->num_rows() != 1) return false;
			return true;
		}

		public function toArray() {
			return array(
				'username' => $this->dni,
				'first_name' => $this->name,
				'last_name' => $this->surname,
				'password' => $this->password,
				'email' => $this->email,
				'phone' => $this->phone,
				'active' => $this->active
			);
		}

		private function createUserFromRawObject($data) {
			$user = new User();

			$user->dni = $data->username;
			$user->name = $data->first_name;
			$user->surname = $data->last_name;
			$user->password = $data->password;
			$user->email = $data->email;
			$user->phone = $data->phone;
			$user->active = $data->active;

			return $user;
		}


	}

?>
