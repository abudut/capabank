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
			if($code === RestController::HTTP_BAD_REQUEST) {
				
				if($id != null) {
					
					$users = $this->user->getUser($id);

					$retmsg = [];
					foreach($users as $user) {
						array_push($retmsg, $user->toArray());
						
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
		
		public function getUser_options($id) {
			parent::setOptions();
		}

		private function getUser($id) {
			
		}
		
		
	}

?>
