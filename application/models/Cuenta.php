<?php
	require_once(APPPATH.'models/Rol.php');
	class Cuenta extends CI_Model {
		

		private $iban;
		private $data;
		private $concepte;
		private $import;
		private $sou;
		private $email;


		public function __construct() {
			$this->iban = '';
			$this->data = '';
			$this->concepte = '';
			$this->import = '';
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

		public function getConcepte() {
			return $this->concepte;
		}

		public function getImport() {
			return $this->import;
		}

		public function getSou() {
			return $this->sou;
		}

		public function getCompte($iban) {

			$condition = array('iban' => $iban);
			$query = $this->db->get_where('compte', $condition);


			if($query->num_rows() != 1) return null;
			else return $this->createCompteFromRawObject($query->result()[0]);
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

	
		public function toArray() {
			return array(
				'iban' => $this->iban,
				'data' => $this->data,
				'concepte' => $this->concepte,
				'import' => $this->import,
				'sou' => $this->sou,
			
			);
		}

		private function createCompteFromRawObject($data) {
			$compte = new Cuenta();

			$compte->iban = $data->iban;
			$compte->data = $data->data;
			$compte->concepte = $data->concepte;
			$compte->import = $data->import;
			$compte->sou = $data->sou;
		

			return $compte;
		}


	}

?>
