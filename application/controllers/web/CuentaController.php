<?php

	class CuentaController extends CI_Controller {

		public function __construct() {
			parent::__construct();	

			//Càrrega dels models
			$this->load->model('cuenta');
			$this->load->model('user');

			//Càrrega dels helpers
			$this->load->helper('url');

			//Càrrega de les llibreries
			$this->load->library('ion_auth');
			if ($this->ion_auth->logged_in() ) {
			$this->load->library('session');	

			} else {
				redirect('login', 'refresh');
			}
		}

		public function index() {
			
			$email=$this->session->userdata('email');
			$headerData['uname'] = $this->session->userdata('username');
			$contentData['cuentas'] = $this->cuenta->getComptesByEmail($email);
			$contentData2['cuentas'] = $this->cuenta->getComptes();
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/inHeader',$headerData);
			$this->load->view('templates/bcrm4');
			if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==3) {
				$this->load->view('pages/cuenta', $contentData);
			}

			if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==2) {
				$this->load->view('pages/cuentapro', $contentData2);
			}
		
			$this->load->view('templates/footer', $footerData);
		}

		public function getCompte(){
		
			$headerData['uname'] = $this->session->userdata('username');
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/header',$headerData);
			$this->load->view('templates/footer', $footerData);
		}

		public function deleteCuenta(){
			$iban = $this->uri->segment('3');
			$this->cuenta->deleteCuenta($iban);
			redirect('cuentas','refresh');
		}

		public function addNewCuenta()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('iban', 'Iban', 'required');
		$this->form_validation->set_rules('sueldo', 'Sueldo', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->load->library('form_validation');


		if ($this->form_validation->run() === FALSE) {
			$headerData['uname'] = $this->session->userdata('username');
			$data['date'] = date('d/m/Y');

			if ($this->ion_auth->logged_in()) {
				$this->load->view('templates/inHeader', $headerData);
				$this->load->view('templates/bcrm2');
				
			} else {
				$this->load->view('templates/defHeader', $headerData);
				$this->load->view('templates/defMenu');
			}

			$this->load->view('pages/add_cuenta');
			$this->load->view('templates/footer', $data);
		} else {

			$this->cuenta->addNewCuenta(
				$this->input->post('iban'),
				$this->input->post('sueldo'),
				$this->input->post('email'),
			);
			redirect('cuentas');
		}
	}

	}
	
?>
