<?php

	use chriskacerguis\RestServer\RestController;	//Ús del namespace

	require_once(APPPATH . 'controllers/ws/WS_MainController.php');

	class WS_UserController extends WS_MainController {

		public function __construct() {
			parent::__construct();

			$this->load->model('user');
		}

		public function getUser_get($id) {
			list($msg, $code) = $this->checkAuthorization();

			if($code !== true) {
				parent::setHeaders();
				$this->response($msg, $code);
				return;
			}

			$user = $this->user->getUser($id);

			if($user == null || $user->getEmail() != $msg) {
				$httpcode = RestController::HTTP_NOT_FOUND;
				$message = array(
					'msg' => 'ID ' . $id . ' no trobat'
				);
			} else {
				$httpcode = RestController::HTTP_OK;
				$message = $user->toArray();
			}

			parent::setHeaders();
			$this->response($message, $httpcode);
		}

		public function getUser_post($id) {}
		
		public function getUser_options($id) {
			parent::setOptions();
		}

		private function getUser($id) {
			
		}
		
		public function getCarsFromClient_post() {
			//TODO code -> crides al model 'client/car' per obtenir les dades de la BD

			//parent::setHeaders();
			//$this->response($msg, $httpcode);
		}

		public function getCarsFromClient_options() {
			parent::setOptions();
		}
		
	}

?>
