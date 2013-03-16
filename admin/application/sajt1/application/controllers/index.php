<?php
class Index extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('cart');
	}
	
	public function index()
	{
	
		$this->load->helper('form');
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
		);
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		//$option['input'] = $this->model_pretraga->input();
		
		//ucitavanje view_header sa promenljivama
		$this->load->view('view_header',$option);
		
		//ucitavanje view_isadv
		$this->load->view('view_index', $option);
		
	}
	public function onama()
	{
	
		$this->load->helper('form');
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
		);
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		//$option['input'] = $this->model_pretraga->input();
		
		//ucitavanje view_header sa promenljivama
		$this->load->view('view_header',$option);
		
		//ucitavanje view_isadv
		$this->load->view('view_onama', $option);
		
	}
	public function saradnici()
	{
	
		$this->load->helper('form');
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
		);
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		//$option['input'] = $this->model_pretraga->input();
		
		//ucitavanje view_header sa promenljivama
		$this->load->view('view_header',$option);
		
		//ucitavanje view_isadv
		$this->load->view('view_saradnici', $option);
		
	}
	public function kontakt($greska=0)
	{
	
		$this->load->helper('form');
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
		);
		if ($greska==1){
			$option['greska'] = "<div style='float:left;font-size:22px;'>Uspešno ste poslali poruku. Uskoro očekujte odgovor.</div>";
		} elseif ($greska==2){
			$option['greska'] = "<div style='float:left;font-size:22px;color:red;'>Niste uspeli da pošaljete poruku. Unesite svoju adresu.</div>";
		}
		//$option['head'] .= $this->model_pretraga->jscript(site_url('isadv/pretraga'));
		//$option['input'] = $this->model_pretraga->input();
		
		//ucitavanje view_header sa promenljivama
		$this->load->view('view_header',$option);
		
		//ucitavanje view_isadv
		$this->load->view('view_kontakt', $option);
		
	}
	public function kontakt_mail()
	{
		
		$this->load->helper('email');
		$this->load->library('email');
		
		if (valid_email($this->input->post('mail')))
		{
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		//izmeniti mejl from!!! Obavezno serverovu mejl adresu, zbog spama.
		$this->email->from('creepy@neptune.arandomserver.com', 'Apoteka Biljana i Luka');
		$mail = "<html><head></head><body>" . $this->input->post('textarea') . "<br>" . $this->input->post('mail') . "<br>" . $this->input->post('name') . "</body></html>";
		
		$this->email->to('goran.blazin@gmail.com');

		$this->email->subject('Kontakt forma, sajt apoteke');
		$this->email->message($mail);

		$this->email->send();
		$greska = 1;
		//send_email('servetopecin@gmail.com', 'Apoteka 9 kontakt forma', $mail);
		//redirect(base_url("index.php/index/kontakt"), 'refresh');
		//echo $this->email->print_debugger();
		} else {
			$greska = 2;
		}
		redirect('index/kontakt/' . $greska, 'refresh');
		//redirect(base_url("index.php/index/kontakt"), 'refresh');
	}
}