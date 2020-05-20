<?php

	use chriskacerguis\RestServer\RestController;	//Ús del namespace

	require_once(APPPATH . 'controllers/ws/WS_MainController.php');

	class WS_CuentaController extends WS_MainController {

		public function __construct() {
			parent::__construct();

			$this->load->model('cuenta');
			$this->load->model('user');
			$this->load->model('rol');


			$this->load->library('ion_auth');
			if ($this->ion_auth->logged_in() && $this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==1) {
			$this->load->library('session');	

			} else {
				redirect('login', 'refresh');
			}
		}

		public function getCuentas_get() {
			$cuenta = $this->cuenta->getComptes();

			parent::setHeaders();

			if(count($cuenta) == 0) {
				$this->response('Empty user', RestController::HTTP_NOT_FOUND);
			} else {
				$msg = [];
				foreach($cuenta as $cuentas) {
					array_push($msg, $cuentas->toArray());
				}
				$this->response($msg, RestController::HTTP_OK);
			}
		}
	
		
		public function getCuenta_get($email=null) {
			
			list($msg, $code) = $this->checkAuthorization();
			if($code === RestController::HTTP_BAD_REQUEST) {
				
				if($email != null) {
					
					$cuentas = $this->cuenta->ws_getCompte($email);

					$retmsg = [];
					foreach($cuentas as $cuenta) {
						array_push($retmsg,$cuenta);
					}

					parent::setHeaders();
					$this->response($retmsg, RestController::HTTP_OK);
				} else {
					
					parent::setHeaders();
					$this->response($msg, $code);
				}
			} else if($code === RestController::HTTP_UNAUTHORIZED) {
				parent::setHeaders();
				$this->response($msg, $code);
		
			}

		}

		public function getUser_post($id) {}
		
		public function getCuenta_options($email=null) {
			parent::setOptions();
		}

		private function getUser($id) {
			
		}
		
		
	}

?>
