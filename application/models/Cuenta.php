<?php
	require_once(APPPATH.'models/Rol.php');
	class Cuenta extends CI_Model {
		

		private $iban;
		private $data;
		private $sou;
		private $email;


		public function __construct() {
			$this->iban = '';
			$this->data = '';
			$this->sou = '';
			$this->email = '';
			
		
			
			$this->load->database('capabankauth');	
		}

		public function getIban() {
			return $this->iban;
		}

		public function getData() {
			return $this->data;
		}


		public function getSou() {
			return $this->sou;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getCompte($iban) {

			$condition = array('iban' => $iban);
			$query = $this->db->get_where('compte', $condition);
			if($query->num_rows() != 1) return null;
			else return $this->createCompteFromRawObject($query->result()[0]);
		}

		public function prova(){
			$iban_destino='ES123';
			$this->db->select_sum('import');
			$this->db->where('iban_destinatario',$iban_destino);
			$query = $this->db->get('transferencia'); 
			$result =$query->row();
			var_dump($result->sou);
		
	}

		public function getComptes() {
			$query = $this->db->get('compte'); 
			$comptes = [];
			foreach($query->result() as $data) {
				$compte = $this->createCompteFromRawObject($data);
				array_push($comptes, $compte);
			}

			return $comptes;
		}

		public function ws_getCompte($email) {

			$condition = array('email_client' => $email);
			$query = $this->db->get_where('compte', $condition);

			if($query->num_rows() != 1) return null;
			else return $query->result_array();
		}


		public function getComptesByEmail($email) {
			$condition = array('email_client' => $email);
			$query = $this->db->get_where('compte', $condition); 
			$comptes = [];
			foreach($query->result() as $data) {
				$compte = $this->createCompteFromRawObject($data);
				array_push($comptes, $compte);
			}

			return $comptes;
		}

		public function deleteCuenta($iban){
			$this->db->where('iban',$iban);	
			$this->db->delete('compte');
		}

		public function addNewCuenta($iban,$sou,$email) {
			$data = array(
				'iban' => $iban,
				'sou' => $sou,
				'email_client' => $email,
			);
			$this->db->insert('compte', $data);
		}

		public function toArray() {
			return array(
				'iban' => $this->iban,
				'data' => $this->data,
				'sou' => $this->sou,
				'email_client' => $this->email,
			
			);
		}

		private function createCompteFromRawObject($data) {
			$compte = new Cuenta();

			$compte->iban = $data->iban;
			$compte->data = $data->data;
			$compte->sou = $data->sou;
			$compte->email = $data->email_client;
		

			return $compte;
		}


	}

?>
