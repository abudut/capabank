<?php
	/**
	 * Controlador que s'encarregarà de carregar la pàgina inicial
	 */

	 class HomeController extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->load->model('user');


			//Càrrega de helpers
			$this->load->helper('url');

			$this->load->library('ion_auth');
			if($this->ion_auth->logged_in()) {
			$this->load->library('session');	
			}
		}
		 
		/* Funció per carregar les pàgines */
		public function view($page = 'home') {
			/* La constant APPPATH conté la ruta fins a la carpeta application/ */
			if(!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
				show_404();
			}

			$data['date'] = date('d/m/Y');
			$headerData['uname'] = $this->session->userdata('username');

			if($this->ion_auth->logged_in()) {
				$this->load->view('templates/inHeader',$headerData);
				if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==1) {
					$this->load->view('templates/adminMenu');
				}

				if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==2) {
					$this->load->view('templates/proMenu');
				}

				if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==3) {
					$this->load->view('templates/clientMenu');
			
				}
			
				}
				else {
					$this->load->view('templates/defHeader',$headerData);
					$this->load->view('templates/defMenu');
				}
			$this->load->view('pages/home');
			$this->load->view('templates/footer', $data);
		}
		
	 }
?>
