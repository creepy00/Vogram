<?php
class Korpa extends CI_Controller {

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
			}
			
			</script>
			<script src="' . base_url() . '/incl/js/cart.js"></script>'
		
		);
		$i=0;
		foreach ($this->cart->contents() as $items){
			$i++;
		}
		if($i>0){
			$this->load->view('view_header',$option);
			$this->load->view('view_korpa',$option);
		}else{
			$this->load->view('view_header',$option);
			$this->load->view('view_korpa_prazna',$option);
		}
		
	}
	function promenikolicinu($id = 0){
		$qtt = $this->input->post('qtt');
		$id = $this->input->post('id');
		$data = $this->cart->contents();
		$data[$id]['qty'] = $qtt;
		$this->cart->update($data[$id]);
		$total = 0;
		$totalQty = 0;
		foreach ($this->cart->contents() as $items){
			$total += $items['subtotal'];
			$totalQty += $items['qty'];
		}
		$json = $data[$id];
		$json['totalqty'] = $totalQty;
		$json['total'] = $total;
		//var_dump($json);
		echo json_encode($json);
	}
	function izbaci($id){
		$data = $this->cart->contents();
		$data[$id]['qty'] = 0;
		$this->cart->update($data[$id]);
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	function placanje(){
	$this->load->model('model_unos');
	$this->load->model('model_login');
	$this->load->helper('form');
	$this->load->helper('email');
	$this->load->library('email');

	
	$option=array(
		
			"title"=>"Apoteka 9",
			
			"tutle"=>"",
			
			"body"=>"onload='setFocus()'",
			
			"head"=>'<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById("name").focus();
			}
			
			</script>'
		
		);
		$greska=0;
		if (strlen(@$this->input->post('name'))>0){
			$greska = $this->model_unos->unoskorpa(@$this->input->post('email'),@$this->input->post('name'),@$this->input->post('surname'),@$this->input->post('phone'),@$this->input->post('address'),@$this->input->post('city'),@$this->input->post('postal'));
			

			if ($greska==0){$option['greska']='';}
			
			elseif ($greska==1){
				
				$this->cart->destroy();
				redirect('korpa/hvala', 'refresh');
			}
			
			elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti sve podatke!';}
			elseif ($greska==3){$option['greska']='Korisničko ime već postoji!';}
			elseif ($greska==4){$option['greska']='Proverite adresu elektronske pošte!';}
		}
		if ($greska==0){
			if($this->session->userdata('ulogovan')==1){
				$row = $this->model_login->placanjepodaci($this->session->userdata('userid'));
				$option['name'] = $row->name;
				$option['surname'] = $row->surname;
				$option['email'] = $row->email;
				$option['city'] = $row->city;
				$option['postal'] = $row->postal;
				$option['address'] = $row->address;
				$option['phone'] = $row->phone;
			}
		} else {
				$option['name'] = @$this->input->post('name');
				$option['surname'] = @$this->input->post('surname');
				$option['email'] = @$this->input->post('email');
				$option['city'] = @$this->input->post('city');
				$option['postal'] = @$this->input->post('postal');
				$option['address'] = @$this->input->post('address');
				$option['phone'] = @$this->input->post('phone');
		}
		$this->load->view('view_header',$option);
		$this->load->view('view_placanje',$option);
	}
	function hvala(){
	$option=array(
		
			"title"=>"Apoteka 9",
			
			"tutle"=>"",
			
			"body"=>"onload='setFocus()'",
			
			"head"=>'<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById("name").focus();
			}
			
			</script>'
		
		);
		$this->load->view('view_header',$option);
		$this->load->view('view_hvala',$option);
	}
}