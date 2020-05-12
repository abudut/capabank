<?php
	class Rol extends CI_Model {

		private $id;
		private $user_id;
		private $group_id;
	

		public function __construct() {
			$this->id = '';
			$this->user_id = '';
			$this->group_id = '';
				
			$this->load->database('capabankauth');	
		}

		public function getId() {
			return $this->id;
		}

		public function getUserId() {
			return $this->user_id;
		}

		public function getGroupId() {
			return $this->group_id;
		}

		public function getRol($id) {

			$condition = array('user_id' => $id);
			$query = $this->db->get_where('users_groups', $condition);

			if($query->num_rows() != 1) return null;
			else return $this->createRolFromRawObject($query->result()[0]);
		}

		public function getRols(){
	
			$query = $this->db->get('users_groups'); 
			$rols = [];
			foreach($query->result() as $data) {
				$rol = $this->createRolFromRawObject($data);
				array_push($rols, $rol);
			}
			return $rols;
		}

		private function createRolFromRawObject($data) {
			$rol = new Rol();
			$rol->id = $data->id;
			$rol->user_id = $data->user_id;
			$rol->group_id = $data->group_id;
			return $rol;
		}
	}

	?>