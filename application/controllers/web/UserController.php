<?php

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//Càrrega dels models
		$this->load->model('user');

		//Càrrega dels helpers
		$this->load->helper('url');
		$this->load->helper('form');


		//Càrrega de les llibreries
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in()) {
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
		$this->load->view('pages/users', $contentData);
		$this->load->view('templates/footer', $footerData);
	}

	public function getUser()
	{
		$headerData['uname'] = $this->session->userdata('username');
		$footerData['date'] = date('d/m/Y');
		$this->load->view('templates/header', $headerData);
		$this->load->view('templates/footer', $footerData);
	}

	public function editUser(){
		$id = $this->uri->segment('3');
		$headerData['uname'] = $this->session->userdata('username');
		$contentData['users'] = $this->user->getUser($id);
		$footerData['date'] = date('d/m/Y');
	
		$this->load->view('templates/inHeader', $headerData);
		$this->load->view('templates/bcrm1');
		$this->load->view('pages/edit_user',$contentData);
		$this->load->view('templates/footer', $footerData);
		$this->user->updateUser(
			$id,
			$this->input->post('dni'),
			$this->input->post('name'),
			$this->input->post('surname'),
			$this->input->post('password'),
			$this->input->post('email'),
			$this->input->post('phone')
		);

	
	}

	public function updateStatus()
	{
	
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->user->updateState($id, $status);

		$this->session->set_flashdata('msg', "El estado del usuario ha canviado satisfactoriamente.");
		$this->session->set_flashdata('msg_class', 'alert-success');

		
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
