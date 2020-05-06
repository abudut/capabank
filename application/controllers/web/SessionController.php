<?php

	class SessionController extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->load->library('ion_auth');
		
		}

		public function login() {
		
			$this->load->library('form_validation');

			$this->form_validation->set_rules('uname', 'Nom d\'usuari', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				
				$footerData['date'] = date('d/m/Y');
				$this->load->view('templates/defHeader');
				$this->load->view('templates/bcrm3');
				$this->load->view('pages/login');
				$this->load->view('templates/footer', $footerData);
			} else {
			
				$remember = (bool) $this->input->post('remember');
				if($this->ion_auth->login($this->input->post('uname'), $this->input->post('password'), $remember)) {
					
					redirect('home', 'refresh');
				} else {
				
					$contentData['error'] = "Les credencials són incorrectes.";
					if($this->ion_auth->is_max_login_attempts_exceeded($this->input->post('uname'))) {
						$contentData['error'] = "Intents d'inici de sessió superats. Intenti-ho més tard.";
					}
					$headerData['uname'] = $this->session->userdata('username');
					$footerData['date'] = date('d/m/Y');
				
					$this->load->view('templates/defHeader',$headerData);
					$this->load->view('pages/login', $contentData);
					$this->load->view('templates/footer', $footerData);
				}
			}
		}

		public function logout(){
			$this->ion_auth->logout();
			redirect('home','refresh');
		}
	}
