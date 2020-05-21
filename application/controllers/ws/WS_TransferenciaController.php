<?php

	use chriskacerguis\RestServer\RestController;	//Ús del namespace

	require_once(APPPATH . 'controllers/ws/WS_MainController.php');

	class WS_TransferenciaController extends WS_MainController {

		public function __construct() {
			parent::__construct();

			$this->load->model('cuenta');
			$this->load->model('user');
            $this->load->model('rol');
            $this->load->model('transferencia');


			$this->load->library('ion_auth');
			if ($this->ion_auth->logged_in() && $this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==3) {
			$this->load->library('session');	

			} else {
				redirect('login', 'refresh');
			}
		}

		public function addTransferencia_post($iban,$concepto,$beneficiario,$import,$email) {
			$transferencia = $this->transferencia->addNewTransferencia($iban, $concepto, $beneficiario, $import, $email);
            parent::setHeaders();
            $retmsg = [];
            if(	$transferencia === FALSE)
        {
            $this->response($retmsg,  RestController::HTTP_BAD_REQUEST);
        }
         
        else
        {
            $this->response($retmsg, RestController::HTTP_OK);
		}}
	
		
		public function  addTransferencia_options($iban,$concepto,$beneficiario,$import,$email) {
			parent::setOptions();
        }	
        
	}
?>
