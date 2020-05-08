<?php
	class User extends CI_Model {

		private $id;
		private $user;
		private $name;
		private $surname;
		private $password;
		private $email;
		private $phone;
		private $active;


		public function __construct() {
			$this->user = '';
			$this->name = '';
			$this->surname = '';
			$this->password = '';
			$this->email = '';
			$this->phone = '';
			$this->active = '';
			
			
			$this->load->database('capabankuth');	
		}

		public function getId() {
			return $this->id;
		}


		public function getUsername() {
			return $this->user;
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

		public function getUser($id) {

			$condition = array('id' => $id);
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

		public function addNewUser($user, $name, $surname,$password,$email,$phone,$active) {
			$data = array(
				'username' => $user,
				'first_name' => $name,
				'last_name' => $surname,	
				'password' => $password,
				'email' => $email,
				'phone' => $phone,
				'active' => $active
			
			);
			$this->db->insert('users', $data);
		}

		public function updateUser($id,$user, $name, $surname,$password,$email,$phone){
			$data = array(
				'username' => $user,
				'first_name' => $name,
				'last_name' => $surname,
				'password' => $password,	
				'email' => $email,
				'phone' => $phone,
			);
			$this->db->where('id',$id);
			$this->db->update('users', $data);
		}

		public function updateState($id,$status){

			if($status == '1'){
				$user_status = '0';
			}
			else{
				$user_status = '1';
			}
			$data = array('active' => $user_status );
			$this->db->where('id',$id);
			$this->db->update('users', $data); 	
		}

		public function toArray() {
			return array(
				'id' => $this->id,
				'username' => $this->user,
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
			$user->id = $data->id;
			$user->user = $data->username;
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
