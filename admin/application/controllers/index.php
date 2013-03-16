<?php
class Index extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
	}
	
	public function index()
	{
	
		$this->load->helper('form');
		$option=array(
		
			"title"=>"Vogram index",
		);
		$this->load->view('view_header',$option);
		$this->load->view('view_index', $option);
		
	}
}