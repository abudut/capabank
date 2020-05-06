<?php

	use chriskacerguis\RestServer\RestController;	//Ús del namespace

	require_once(APPPATH . 'controllers/ws/WS_MainController.php');

	class WS_ClientController extends WS_MainController {

		public function __construct() {
			parent::__construct();

			$this->load->model('client');
		}

		public function getClient_get($dni) {
			list($msg, $code) = $this->checkAuthorization();

			if($code !== true) {
				parent::setHeaders();
				$this->response($msg, $code);
				return;
			}

			$client = $this->client->getClient($dni);

			if($client == null || $client->getEmail() != $msg) {
				$httpcode = RestController::HTTP_NOT_FOUND;
				$message = array(
					'msg' => 'DNI ' . $dni . ' no trobat'
				);
			} else {
				$httpcode = RestController::HTTP_OK;
				$message = $client->toArray();
			}

			parent::setHeaders();
			$this->response($message, $httpcode);
		}

		public function getClient_post($dni) {}
		
		public function getClient_options($dni) {
			parent::setOptions();
		}

		private function getClient($dni) {
			
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
