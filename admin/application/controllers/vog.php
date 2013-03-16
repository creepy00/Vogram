<?php
class Vog extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('ulogovan')==0)
		{		
			redirect(base_url("/index.php/login"), 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->model('model_login');
		$this->load->view('view_header');
		$this->load->view('view_indexlog');
		
	}
	
	public function indexlog()
	{
	
		$this->load->helper('form');
		$this->load->model('model_login');
		$this->load->view('view_header');
		$this->load->view('view_indexlog');
		
		
	}
	
	function unosnovogprojekta($greska = 0)
	{
		$this->load->helper('form');
		
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Unos novog projekta";
		$option['body'] = "onload='setFocus()'";			
		
		$this->load->view('view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=', Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=', Nedovoljno podataka: morate uneti sve sem video linka i linka!';}
		else {$option['greska']=', Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('view_unosnovogprojekta',$option);
	}
	
	function unesiprojekat()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$greska = $this->model_unos->unosprojekta($this->input->post('type'),$this->input->post('text'),$this->input->post('video_link'),$this->input->post('links'),$this->input->post('sinopsis'),$this->input->post('name'));
		redirect('/vog/unosnovogprojekta/' . $greska, 'refresh');
	}
}