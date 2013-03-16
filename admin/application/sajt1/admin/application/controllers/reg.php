<?php
class Reg extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
	}
	
	public function index()
	{
	
	//$this->session->sess_destroy();
	

		$this->load->helper('form');
	//	$this->load->model('model_pretraga');
		
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
			
			"tutle"=>"",
			
			"body"=>"onload='setFocus()'",
			
			"head"=>'<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById("searchbox").focus();
			}</script>'
		
		);
		$option['tutle']="Vrednost tutle";
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		$option['input'] = $this->model_pretraga->input();
		//echo base_url();
		
		//ucitavanje view_header sa promenljivama
		//$this->load->view('view_header',$option);
		
		//ucitavanje view_isadv
		//$this->load->view('view_isadv', $option);
		
	}

	function novkorisnik($greska = 0)
	{
		$this->load->helper('form');
	
		$option['title'] = "Registrujte se";
		$option['body'] = "onload='setFocus()'";			
		$option['head'] = "<SCRIPT language=JavaScript>
							function setFocus() {
								document.forma.username.focus();
							}
							</script>";
		$this->load->view('admin/view_headerreg',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']='Uneto u bazu!';}
		elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti sva 3 podatka!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_registracija',$option);
	}
	
	function registruj()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		$greska = $this->model_unos->unosregistracija($this->input->post('username'),$this->input->post('password'),$this->input->post('email'));
		redirect('/reg/novkorisnik/' . $greska, 'refresh');
	}
}