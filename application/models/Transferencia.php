<?php
	require_once(APPPATH.'models/Rol.php');
	class Transferencia extends CI_Model {
		
        private $iban_destino;
        private $concepto;
		private $beneficiario;
		private $data;
		private $import;
		private $email;


		public function __construct() {
            $this->iban_destino = '';
            $this->concepto = '';
            $this->beneficiario = '';
            $this->data = '';
			$this->import = '';
			$this->email = '';
            

			
			$this->load->database('capabankauth');	
		}

		public function getIbanDest() {
			return $this->iban_destino;
        }

            
        public function getConcepto() {
			return $this->concepto;
		}


        public function getBeneficiario() {
			return $this->beneficiario;
		}
    
		public function getData() {
			return $this->data;
		}


		public function getImport() {
			return $this->import;
		}

		public function getEmail() {
			return $this->email;
		}
	
		public function getTransferencia($iban_destino) {

			$condition = array('iban_destinatario' => $iban_destino);
			$query = $this->db->get_where('transferencia', $condition);


			if($query->num_rows() != 1) return null;
			else return $this->createTransFromRawObject($query->result()[0]);
		}

		public function getTransferencias($email) {
			$condition = array('email_client' => $email);
			$query = $this->db->get_where('transferencia', $condition); 
			$transferencias = [];
			foreach($query->result() as $data) {
				$transferencia = $this->createTransFromRawObject($data);
				array_push($transferencias, $transferencia);
			}

			return $transferencias;
		}


		public function addNewTransferencia($iban_destino,$concepto, $beneficiario,$import,$email) {
			$data = array(
				'iban_destinatario' => $iban_destino,
				'concepto' => $concepto,
				'beneficiario' => $beneficiario,	
				'import' => $import,
				'email_client' => $email,
				
			);
			$this->db->insert('transferencia', $data);
		}

	
		public function toArray() {
			return array(
                'iban_destinatario' => $this->iban_destino,
                'concepto' => $this->concepto,
				'beneeficiario' => $this->beneficiario,
				'data' => $this->data,
				'import' => $this->import,
				'email_client' => $this->email,
			
			);
		}

		private function createTransFromRawObject($data) {
			$transf = new Transferencia();

			$transf->iban_destino = $data->iban_destinatario;
            $transf->data = $data->data;
            $transf->beneficiario = $data->beneficiario;
			$transf->concepto = $data->concepto;
			$transf->import = $data->import;
		
		

			return $transf;
		}


	}

?>
