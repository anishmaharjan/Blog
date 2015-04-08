<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
		$this->load->model('model_blogs');
	}

	
	public function index()
	{
		//$this->load->view('home');
		$this->login();
		//$this->load->theme('demo');
	}

	public function login()
	{
		$this->load->view('view_login');

	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5');

		if($this->form_validation->run())
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1

				);
			$this->session->set_userdata($data);
			redirect('login/blogs');
		}
		else
		{
			$this->load->view('view_login');
		}
	}

	public function validate_credentials(){
		if($this->model_users->can_log_in())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials','Incorrect');
			return false;
		}
	}

	public function blogs()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data = array();
			if($query = $this->model_blogs->get_posts())
			{
				$data['rec'] = $query;
			}
			$this->load->view('blogs',$data);

		}
		else
		{
			redirect('login/restricted');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function restricted()
	{
		$this->load->view('restricted');
	}
//////////////////////////////////////////////
	/////////////////CRUD

	public function create()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
			);
		$this->model_blogs->add_post($data);
		redirect('login/blogs');

	}

	public function delete()
	{
		$this->model_blogs->delete_post();
		redirect('login/blogs');
	}





}
