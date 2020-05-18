<?php

	class TransferenciaController extends CI_Controller {

		public function __construct() {
			parent::__construct();	

			//Càrrega dels models
            $this->load->model('cuenta');
			$this->load->model('user');
			$this->load->model('transferencia');

			//Càrrega dels helpers
			$this->load->helper('url');

			//Càrrega de les llibreries
			$this->load->library('ion_auth');
			if ($this->ion_auth->logged_in() && $this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==3 ) {
			$this->load->library('session');	

			} else {
				redirect('login', 'refresh');
			}
		}

		public function index() {

			$email=$this->session->userdata('email');
			$headerData['uname'] = $this->session->userdata('username');
			$contentData['transferencias'] = $this->transferencia->getTransferencias($email);
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/inHeader',$headerData);
			$this->load->view('templates/bcrm6');
			$this->load->view('pages/transferencia', $contentData);
			$this->load->view('templates/footer', $footerData);
		}

		public function addNewTransferencia(){
			$email=$this->session->userdata('email');
			$headerData['uname'] = $this->session->userdata('username');
			$contentData['transferencias'] = $this->transferencia->getTransferencias($email);
			$footerData['date'] = date('d/m/Y');
			$this->load->view('templates/inHeader',$headerData);
			$this->load->view('templates/bcrm7');
			$this->load->view('pages/add_transf', $contentData);
			$this->load->view('templates/footer', $footerData);
		
		}

		public function transferir(){
			$this->transferencia->addNewTransferencia(
				$this->input->post('iban'),
				$this->input->post('concepto'),
				$this->input->post('beneficiario'),
				$this->input->post('importe'),
				$this->session->userdata('email')
			);
			redirect('transferencias');
		}

	}
