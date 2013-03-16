<?php
	class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('ulogovan')==1)
		{	
						
			redirect(base_url("index.php/apo"), 'refresh');

		}
		$this->load->helper('form');
		$options['footer'] = "TEST!!!!!!!!!!!!!!";
		$options['title'] = "Prijavi se";
		$this->load->view('admin/view_login', $options);
		
	}
	public function provera()
	{
		$this->load->model('model_login');
		
		$this->load->helper('url');
		$korime = $this->input->post('korime');
		$lozinka = $this->input->post('lozinka');
		
		if($this->model_login->loginupit($korime, $lozinka))
		{	
			$this->session->set_userdata('ulogovan', '1');
			redirect(base_url("index.php/apo/proizvodi"), 'refresh');
		} else {redirect(base_url("index.php/login"), 'refresh');}

	}
	public function odjava()
	{
	$this->session->sess_destroy();
	redirect(base_url("index.php/login"), 'refresh');
	}
}
