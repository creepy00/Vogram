<?php
class Reg extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('cart');
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
				document.getElementById("username").focus();
			}</script>'
		
		);
		
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		//$option['input'] = $this->model_pretraga->input();
		//echo base_url();
		
		//ucitavanje view_header sa promenljivama
		$this->load->view('view_header',$option);
		$this->load->view('view_registracija',$option);
		
		
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
		$this->load->view('view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']='Uspešno ste se registrovali, prijavite se.';}
		elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti bar korisničko ime, lozinku i adresu elektronske pošte!';}
		elseif ($greska==3){$option['greska']='Korisničko ime već postoji!';}
		elseif ($greska==4){$option['greska']='Neispravna adresa elektronske pošte!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('view_registracija',$option);
	}
	
	function registruj()
	{
		$this->load->helper('email');
		$this->load->helper('url');
		$this->load->model('model_unos');
		$greska = $this->model_unos->unosregistracija($this->input->post('username'),$this->input->post('password'),$this->input->post('email'),$this->input->post('name'),$this->input->post('surname'),$this->input->post('phone'),$this->input->post('address'),$this->input->post('city'),$this->input->post('postal'));
		if($greska==1){
		redirect('/login/index/' . $greska, 'refresh');
		}else{
		//redirect('/reg/novkorisnik/' . $greska, 'refresh');
		$this->novkorisnik($greska);
		}
	}
}