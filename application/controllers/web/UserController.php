<?php

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//Càrrega dels models
		$this->load->model('user');
		$this->load->model('rol');
	
		//Càrrega dels helpers
		$this->load->helper('url');
		$this->load->helper('form');


		//Càrrega de les llibreries
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in() && $this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==1 || $this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==2 ) {
			$this->load->library('session');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		$headerData['uname'] = $this->session->userdata('username');
		$contentData['users'] = $this->user->getUsers();
		$footerData['date'] = date('d/m/Y');
		$this->load->view('templates/inHeader', $headerData);
		$this->load->view('templates/bcrm1');
		if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==1){
			$this->load->view('pages/users',$contentData);
		}

		if ($this->user->getUserByUname($this->session->userdata('username'))->getRol()->getGroupId() ==2){
			$this->load->view('pages/prousers',$contentData);
		}

		$this->load->view('templates/footer', $footerData);
	}

	public function getUser()
	{
		$headerData['uname'] = $this->session->userdata('username');
		$footerData['date'] = date('d/m/Y');
		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/footer', $footerData);
	}

	public function editUser()
	{
		$id = $this->uri->segment('3');
		$headerData['uname'] = $this->session->userdata('username');
		$contentData['users'] = $this->user->getUser($id);
		$footerData['date'] = date('d/m/Y');
		$this->load->view('templates/inHeader', $headerData);
		$this->load->view('templates/bcrm5');
		$this->load->view('pages/edit_user', $contentData);
		$this->load->view('templates/footer', $footerData);

	}

	public function updateUser(){
		$id = $this->uri->segment('3');
		$res = $this->user->updateUser(
			$id,
			$this->input->post('edni'),
			$this->input->post('ename'),
			$this->input->post('esurname'),
			$this->input->post('epassword'),
			$this->input->post('eemail'),
			$this->input->post('ephone')
		);
		if($res<1) {
			$this->session->set_flashdata('msg', "El usuario se ha actualizado exitosamente.");
			$this->session->set_flashdata('msg_class', 'alert-success');
		} else {
			$this->session->set_flashdata('msg', "El usuario no se ha podido actualizar.");
			$this->session->set_flashdata('msg_class', 'alert-danger');
		}
		redirect('users','refresh');
	}

	public function updateStatus()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->user->updateState($id, $status);
		$this->session->set_flashdata('msg', "El estado del usuario se ha canviado exitosamente.");
		$this->session->set_flashdata('msg_class', 'alert-success');
		redirect('users');
	}

	public function changeUserRol(){
		$id = $this->input->post('id');
		$rol = $this->input->post('rol');
		$this->user->setUserRol($id,$rol);
		redirect('users');
	}

	public function deleteUser(){
		$id = $this->uri->segment('3');
		$this->user->deleteUser($id);
		redirect('users','refresh');
	}

	public function addNewUser()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dni', 'Usuario', 'required');
		$this->form_validation->set_rules('name', 'Nom', 'required');
		$this->form_validation->set_rules('surname', 'Cognoms', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Telefono', 'required');
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

			$this->load->view('pages/add_user');
			$this->load->view('templates/footer', $data);
		} else {

			$this->user->addNewUser(
				$this->input->post('dni'),
				$this->input->post('name'),
				$this->input->post('surname'),
				password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				$this->input->post('email'),
				$this->input->post('phone')
			);
			redirect('users');
		}
	}
}
?>