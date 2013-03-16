<?php
	class Login extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->library('cart');
		}
	public function index($greska=0)
	{
		if($this->session->userdata('ulogovan')==1)
		{	
			//$this->session->sess_destroy();
			redirect(base_url("index.php"), 'refresh');

		}
		$this->load->helper('form');
		$options['footer'] = "TEST!!!!!!!!!!!!!!";
		$options['title'] = "Prijavi se";
		$options['head'] = "<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById(\"korime\").focus();
			}</script>";
		if($greska==1){
		$options['greska'] = "Uspešno ste se registrovali. Molimo Vas, prijavite se.";
		}
		$this->load->view('view_header', $options);
		$this->load->view('view_login', $options);
		
	}
	public function provera()
	{
		$this->load->model('model_login');
		
		$this->load->helper('url');
		$korime = $this->input->post('korime');
		$lozinka = $this->input->post('lozinka');
		$referer = $this->input->post('referer');
		//die($referer);
		$userid = $this->model_login->loginupit($korime, $lozinka);
		//die($korime . $lozinka . $userid);
		//$this->uri->uri_to_assoc($this->uri->total_segments()-1);
		$this->uri->slash_segment(3, 'leading');
		//echo $this;
		if($userid)
		{	
			$this->session->set_userdata('ulogovan', '1');
			$this->session->set_userdata('userid', $userid);
			if ($referer==$_SERVER['HTTP_REFERER']){
				//die(site_url());
				redirect(site_url(), 'refresh');
			} else {
				//die($referer);
				redirect($referer, 'refresh');
			}
		} else {
			//die("ne radi");
			redirect(base_url("index.php/login"), 'refresh');}

	}

	public function odjava()
	{
	$this->session->sess_destroy();
	redirect(base_url(), 'refresh');
	}
}
