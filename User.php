<?php 

class User extends CI_Controller {

	public function __construct ()
	{
		parent ::__construct ();
		$this->load->model('User_model');
		$this->load->library('form_validation');

		if(empty($this->session->userdata('login')) && $this->session->userdata('login') != true)
		{
			redirect('login');
		}
	}

	public function index ()
	{
	
		$data['judul'] = 'Daftar User';
		$data['user'] = $this->User_model->getAllUser();
		if ($this->input->post('keyword')) {
			$data['user'] = $this->User_model->cariDataUser();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah ()
	{

		$data['judul'] = 'From Tambah Data User';

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_rules('fullname', 'fullname', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header',$data);
		$this->load->view('user/tambah');
		$this->load->view('templates/footer');
		} else{
			$this->User_model->tambahDataUser();
			$this->session->set_flashdata('flash','Di Simpan');
			redirect("user");
		}

	}

	public function hapus($id)
	{
		$this->User_model->hapusDataUser($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect("user");
	}

	public function ubah ($id)
	{
		$post = $this->input->post(null, true);

		$data['judul'] = 'From ubah Data User';
		$data['user'] = $this->User_model->getUserById($id);

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('fullname', 'fullname', 'required|trim');
		if (!empty($post['password'])) {
			$this->form_validation->set_rules('password', 'password', 'required|trim');
		}

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header',$data);
		$this->load->view('user/ubah',$data);
		$this->load->view('templates/footer');
		} else{
			$this->User_model->ubahDataUser();
			$this->session->set_flashdata('flash','Di ubah');
			redirect("user");
		}

	}
}