<?php

Class Home extends CI_Controller
{

	public function __construct ()
	{
		parent ::__construct ();

		if(empty($this->session->userdata('login')) && $this->session->userdata('login') != true)
		{
			redirect('login');
		}
	}

	public function index ($nama = '')
	{
		$data['judul'] = 'Halaman Home';
		$data['nama'] = $nama;
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}