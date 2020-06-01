<?php
    use chriskacerguis\RestServer\RestController;	//Ús del namespace
	require_once(APPPATH . 'libraries/codeigniter-restserver/src/RestController.php');
	require_once(APPPATH . 'libraries/codeigniter-restserver/src/Format.php');

    class WS_MainController extends RestController {

        public function __construct() {
			parent::__construct();

			$this->load->model('user');
		}
		
		protected function checkAuthorization() {
			if($this->head('Authorization') == NULL) {
				$message = "Header not found";
				$httpcode = RestController::HTTP_BAD_REQUEST;
				return array($message, $httpcode);
			} else{
				$tokenData = explode(' ', $this->head('Authorization'));
				if(count($tokenData) != 2) {
					$message = "Token not found";
					$httpcode = RestController::HTTP_BAD_REQUEST;
					return array($message, $httpcode);
				}
				$token = $tokenData[1];

				//Connectar amb OKTA
				$curldata = curl_init();
				curl_setopt($curldata, CURLOPT_URL, 'https://dev-216506.okta.com/oauth2/default/v1/userinfo');
				curl_setopt($curldata, CURLOPT_POST, 1);
				curl_setopt($curldata, CURLOPT_RETURNTRANSFER, true);
				$headers = ['Authorization: Bearer ' . $token];
				curl_setopt($curldata, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($curldata);
				curl_close($curldata);

				
				$json_result = json_decode($result, true);	//Transforma un string JSON en un array
				if(!isset($json_result['email'])) {
					//Google OAUTH
					$curldata = curl_init();
					curl_setopt($curldata, CURLOPT_URL, 'https://dev-216506.okta.com/oauth2/v1/userinfo');
					curl_setopt($curldata, CURLOPT_POST, 1);
					curl_setopt($curldata, CURLOPT_RETURNTRANSFER, true);
					$headers = ['Authorization: Bearer ' . $token];
					curl_setopt($curldata, CURLOPT_HTTPHEADER, $headers);

					$result = curl_exec($curldata);
					curl_close($curldata);

					$json_result = json_decode($result, true);	//Transforma un string JSON en un array
				}

					//Comprovar contra la BD
					$json_result = json_decode($result, true);	//Transforma un string JSON en un array
					$email = $json_result['email'];
					$correct = $this->user->checkUserEmail($email);
					if(!$correct) {
						$message = "Invalid user";
						$httpcode = RestController::HTTP_UNAUTHORIZED;
						return array($message, $httpcode);
					}
					return array($email, true);
				}
			}

        protected function setHeaders($token = null) {
            $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-type, Accept");
            $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
			$this->output->set_header("Access-Control-Allow-Origin: *");
			
			/*if($token != NULL) {
                $this->output->set_header("Access-Control-Expose-Headers: Authorization");
                $this->output->set_header("Authorization: " . $token);
            }*/
        }

        protected function _parse_post() {
            if($this->request->format === 'json') {
                //Truc per tal que el JSON quedi ben carregat (parsejat) a $_POST
				$_POST = json_decode(file_get_contents('php://input'), true);
            }
            parent::_parse_post();
        }

        protected function setOptions() {
            $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-type, Accept, Authorization");
            $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            $this->output->set_header("Access-Control-Allow-Origin: *");
			//$this->output->set_header("Authentication: Beared xxx");

            $this->response(NULL, RestController::HTTP_OK);
        }
    }
