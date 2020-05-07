<?php

	class CuentaController extends CI_Controller {

		public function __construct() {
			parent::__construct();	

			//Càrrega dels models
			$this->load->model('cuenta');

			//Càrrega dels helpers
			$this->load->helper('url');

			//Càrrega de les llibreries
			$this->load->library('ion_auth');
			if($this->ion_auth->logged_in()) {
			$this->load->library('session');	

			} else {
				redirect('login', 'refresh');
			}
		}

		public function index() {
			$headerData['uname'] = $this->session->userdata('username');
			$contentData['cuentas'] = $this->cuenta->getComptes();
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/inHeader',$headerData);
			$this->load->view('templates/bcrm4');
			$this->load->view('pages/cuenta', $contentData);
			$this->load->view('templates/footer', $footerData);
		}

		public function getCompte(){
		
			$headerData['uname'] = $this->session->userdata('username');
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/header',$headerData);
			$this->load->view('templates/footer', $footerData);
		}

	}
	
?>
