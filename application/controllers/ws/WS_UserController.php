<?php

	use chriskacerguis\RestServer\RestController;	//Ús del namespace

	require_once(APPPATH . 'controllers/ws/WS_MainController.php');

	class WS_UserController extends WS_MainController {

		public function __construct() {
			parent::__construct();

			$this->load->model('user');
		}
	
		public function getUsers_get() {
			$user = $this->user->getUsers();

			parent::setHeaders();

			if(count($user) == 0) {
				$this->response('Empty user', RestController::HTTP_NOT_FOUND);
			} else {
				$msg = [];
				foreach($user as $us) {
					array_push($msg, $us->toArray());
				}
				$this->response($msg, RestController::HTTP_OK);
			}
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
		
		
	}

?>
