<?php

class Sistem extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		if($this->session->userdata('userlogin') == $this->config->item('username') ){
			redirect('Sistem/login');
		}
		$this->load->library('form_validation');
		$this->load->model('Sistem_model','sistem');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data = [
			'i' 	=> trim($this->input->get('i')),
			'f' 	=> trim($this->input->get('f')),
			'ts' 	=> trim($this->input->get('ts')),
			'tp'	=> trim(date('Y-m-d H:i:s')), 
			'data'  => trim($_SERVER['REQUEST_URI']),
			'server_time' => trim(date('Y-m-d H:i:s'))
		];		
		
		$this->db->insert('data', $data);
		redirect('Sistem/dashboard');
	}

	public function login()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==false){

			$data['title'] = "Login | Monita Loker";
			$this->load->view('login',$data);

		}else{

			$this->_login();

		}
	}
	
	private function _login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');  

		$admin = [
			'username' => $this->config->item('username'),
			'password' => $this->config->item('password')
		];
		
		if($username == $admin['username']) {

			if($password == $admin['password'] ){
				
				$data = [
					'username' => $username,
					'status' => "login"
				];

				$this->session->set_userdata('userlogin',$data);
				redirect('Sistem/dashboard');

			} else {

				$this->session->set_flashdata('message',
					'<div class="alert alert-danger" role="alert">
					Password Wrong!
					</div>');
				redirect('Sistem/login');
			}

		} else {
			$this->session->set_flashdata('message',
				'<div class="alert alert-danger" role="alert">
				Username is not Registered!
				</div>');
			redirect('Sistem/login');
		}		

	}	

	public function dashboard()
	{	
		// Proses Search //
		if($this->input->get('submit')) {

			$data['i'] = trim($this->input->get('i'));
			$this->session->set_userdata('i', $data['i']);
			$data['flag'] = trim($this->input->get('f'));
			$this->session->set_userdata('f', $data['flag']);
			$data['get'] = trim($this->input->get('data'));
			$this->session->set_userdata('data', $data['get']);
			$data['tgl_awal'] = trim($this->input->get('tgl_awal',TRUE));
			$this->session->set_userdata('tgl_awal', $data['tgl_awal']);
			$data['tgl_akhir'] = trim($this->input->get('tgl_akhir',TRUE));
			$this->session->set_userdata('tgl_akhir', $data['tgl_akhir']);
			$data['waktu_awal'] = trim($this->input->get('waktu_awal',TRUE));
			$this->session->set_userdata('waktu_awal', $data['waktu_awal']);
			$data['waktu_akhir'] = trim($this->input->get('waktu_akhir',TRUE));
			$this->session->set_userdata('waktu_akhir', $data['waktu_akhir']);

		} else {
			$data['i'] = $this->session->userdata('i');
			$data['flag'] = $this->session->userdata('f');
			$data['get'] = $this->session->userdata('data');
			$data['tgl_awal'] = $this->session->userdata('tgl_awal');
			$data['tgl_akhir'] = $this->session->userdata('tgl_akhir');
			$data['waktu_awal'] = $this->session->userdata('waktu_awal');
			$data['waktu_akhir'] = $this->session->userdata('waktu_akhir');
		}
		//Config //
		$config['base_url'] = 'http://localhost/loker_monita/Sistem/dashboard';
		$this->db->like('i', $data['i']);
		$this->db->like('f', $data['flag']);  
		$this->db->like('data', $data['get']);

		if ($data['tgl_awal'] != '') {
			$this->db->where('tp >=' ,date('Y-m-d H:i:s',strtotime($data['tgl_awal'])));
		}elseif ($data['tgl_akhir'] != '') {
			$this->db->where('tp <=' ,date('Y-m-d H:i:s',strtotime($data['tgl_akhir'])));
		}elseif ($data['waktu_awal'] != '') {
			$this->db->where('ts >=' ,$data['waktu_awal']);
		}elseif ($data['waktu_akhir'] != '') {
			$this->db->where('ts <=' ,$data['waktu_akhir']);
		}

		$this->db->from('data');

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 20;

		//Style//
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-end mb-1">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item ">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];

		//Initialize //
		$this->pagination->initialize($config);
		
		$data['title'] = "Dashboard | Monita Loker";
		$data['header'] = "Dashboard";
		if($this->session->userdata('userlogin') == "" ){
			redirect('Sistem/login');
		}
		$data['admin'] = $this->session->userdata('userlogin');

		$data['start'] = $this->uri->segment(3);
		$data['data'] = $this->sistem->getData($config['per_page'],$data['start'],$data['i'],$data['flag'],$data['get'],$data['tgl_awal'],$data['tgl_akhir'],$data['waktu_awal'],$data['waktu_akhir']);

		$this->load->view('templates/header', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('userlogin');
		$this->session->set_flashdata('message',
			'<div class="alert alert-success" role="alert">
			You have been Logged out!
			</div>');
		redirect('Sistem/login');
	}

}