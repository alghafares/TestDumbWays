<?php

Class Login extends CI_Controller {

	protected $userdetail;

	public function __construct ()
	{
		parent ::__construct ();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!empty($this->session->userdata('login')) && $this->session->userdata('login') == true)
		{
			redirect('home');
		}
		else
		{
			$this->load->view('login/index');
		}
	}

	public function proses()
	{
		$post = $this->input->post(null, true);

		if(isset($post['username']))
		{
			$this->userdetail = $this->User_model->get_by(['username' => $post['username']], TRUE);
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_passwordcek');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/index');
		}
		else
		{
			$data['id']       = $this->userdetail->id;
			$data['fullname'] = $this->userdetail->fullname;
			$data['login']    = true;

			$this->session->set_userdata($data);

			redirect('home');
		}
	}

	public function passwordcek($str)
	{
		$userdetail = $this->userdetail;

		if(@$userdetail->password == $str)
		{
			return TRUE;
		}
		else if(@$userdetail->password)
		{
			$this->form_validation->set_message('passwordcek', 'Password Anda Salah');
			return FALSE;
		}
		else
		{
			$this->form_validation->set_message('passwordcek', 'Anda tidak memiliki akses');
			return FALSE;
		}
	}

	public function hapus()
	{
		$data  = ['id', 'fullname', 'login'];
		$unset = $this->session->unset_userdata($data);

		if($unset)
		{
			redirect('login');
		}
		else
		{
			redirect('home');
		}
	}

}