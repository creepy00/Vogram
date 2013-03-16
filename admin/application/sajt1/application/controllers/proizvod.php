<?php
class Proizvod extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('cart');
	}
	function dod($product_id){
		$this->load->model('model_proizvod');
		$ima = false;
		foreach ($this->cart->contents() as $items){
			if($items['id']==$product_id){
			$ima=true;
			$item = $items;
			}
		}
		//die($ima);
		$product = $this->model_proizvod->proizvod($product_id);

		$data = array(
               'id'      => $product['product_id'],
               'qty'     => 1,
               'price'   => $product['product_price'],
               'image'   => $product['image'],
               'name'    => $product['product_name']
            );
		
		if($ima){
			$item['qty'] += 1;
			$data['update'] = 1;
			$this->cart->update($item);
		}else{
			$this->cart->insert($data);
		}
		$this->session->set_userdata("dod",$data);
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	function dodpost(){
		//die($this->input->post('product_id'));
		$this->load->model('model_proizvod');
		//$this->cart->contents();
		$ima=false;
		foreach ($this->cart->contents() as $items){
			if($items['id']==$this->input->post('product_id')){
			$ima=true;
			$item = $items;
			}
		}
		//die($ima);
		$product = $this->model_proizvod->proizvod($this->input->post('product_id'));

		$data = array(
               'id'      => $product['product_id'],
               'qty'     => $this->input->post('pieces'),
               'price'   => $product['product_price'],
               'image'   => $product['image'],
               'name'    => $product['product_name']
            );
		if($ima){
			//$data = $this->cart->contents();
			$item['qty'] += $this->input->post('pieces');
			$this->cart->update($item);
			//$this->cart->update($data);
		}else{
			$this->cart->insert($data);
		}
		$this->session->set_userdata("dod",$data);
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	public function index($idproizvoda=0)
	{
	$this->load->helper('form');
	$this->load->model('model_proizvod');
	$product = $this->model_proizvod->proizvod($idproizvoda);
	
	$komentari = $this->model_proizvod->komentari($idproizvoda);
	$thumbUpDown =  $this->model_proizvod->thumbsUpDown($idproizvoda);
	$option['thumbUpDown'] = $thumbUpDown;
	$option['komentari'] = $komentari;
	$option['product_id'] = $product['product_id'];
	$option['image'] = $product['image'];
	$option['product_name'] = $product['product_name'];
	$option['product_price'] = $product['product_price'];
	$option['description'] = nl2br($product['description']);
	
	$option['head']="<script>
					function isNumberKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keyCode;
						if (charCode != 46 && charCode > 31
						&& (charCode < 48 || charCode > 57))
						return false;
						return true;
					} 
					</script>";
	$this->load->view('view_header',$option);

	$this->load->view('view_proizvod', $option);
	
		
	}
	
	function dotkom(){
		$this->load->model('model_proizvod');
		
		$komentar = $this->input->post('komentar');
		$product_id = $this->input->post('product_id');
		$user_id = $this->session->userdata('userid');
		
		$greska = $this->model_proizvod->unesikomentar($user_id,$komentar,$product_id);
		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	function setthumb($id, $UD){
		$this->load->model('model_proizvod');

		$user_id = $this->session->userdata('userid');
		$greska = $this->model_proizvod->setthumb($id, $UD ,$user_id);
		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
}