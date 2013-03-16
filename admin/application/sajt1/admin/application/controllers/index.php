<?php
class Index extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
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
	public function kontakt()
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
		$this->load->view('view_kontakt', $option);
		
	}
	
}