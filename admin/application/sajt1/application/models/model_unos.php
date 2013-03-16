<?php
class Model_unos extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function unoskategorije($category_name)
	{
		$i=0;
		
		if ($category_name!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<1)
		{
			return 1;
		} else {
			
			$sql = "INSERT INTO category (category_name) VALUES(" . 
			$this->db->escape($category_name) . ")";
			$this->db->query($sql);
			return 1;
		}
		
	}
	
	function unosregistracija($username,$password,$email,$name,$surname,$phone,$address,$city,$postal)
	{
		
		$i=0;
		
		if ($username!="")
		$i++;
		if ($password!="")
		$i++;
		if ($email!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<3)
		{
			return 2;
		} else {
		if (!(valid_email($email)))
		{
			return 4;
		}
			$sql = "SELECT * FROM user WHERE username = ".$this->db->escape($username)."";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return 3;
			}
			$sql = "INSERT INTO user (username,password,email,city,postal,address,phone,name,surname) VALUES(" . 
			$this->db->escape($username) . "," . $this->db->escape($password) . "," . $this->db->escape($email) . "," . $this->db->escape($city) . "," . $this->db->escape($postal) . "," . $this->db->escape($address) . "," . $this->db->escape($phone) . "," . $this->db->escape($name) . "," . $this->db->escape($surname) . ")";
			$this->db->query($sql);
			return 1;
		}
		
	}
	function unoskorpa($email,$name,$surname,$phone,$address,$city,$postal)
	{
		$i=0;
		
		if ($name!="")
		$i++;
		if ($surname!="")
		$i++;
		if ($address!="")
		$i++;
		if ($city!="")
		$i++;
		if ($postal!="")
		$i++;
		if ($phone!="")
		$i++;
		if ($email!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<7)
		{
			return 2;
		} else {
		if (!(valid_email($email)))
		{
			return 4;
		}
			if ($this->session->userdata('userid')>0){
				$sql = "UPDATE user SET name={$this->db->escape($name)},surname={$this->db->escape($surname)},email={$this->db->escape($email)},city={$this->db->escape($city)},postal={$this->db->escape($postal)},address={$this->db->escape($address)},phone={$this->db->escape($phone)} WHERE user_id = {$this->session->userdata('userid')}";
				$this->db->query($sql);
			}
			
				$sql = "INSERT INTO orders (datetime,email,city,postal,address,phone,name,surname) VALUES(
				NOW()," . $this->db->escape($email) . "," . $this->db->escape($city) . "," . $this->db->escape($postal) . "," . $this->db->escape($address) . "," . $this->db->escape($phone) . "," . $this->db->escape($name) . "," . $this->db->escape($surname) . ")";
				$this->db->query($sql);
				$order_id = $this->db->insert_id();
			$ukupnacena = 0;
			$proizvodi = "";
			foreach ($this->cart->contents() as $items){
				$sql = "INSERT INTO items (order_id,product_id,product_price,quantity,sum_price,product_name) VALUES(" . 
				$this->db->escape($order_id) . "," . 
				$this->db->escape($items['id']) . "," . 
				$this->db->escape($items['price']) . "," . 
				$this->db->escape($items['qty']) . "," . 
				$this->db->escape($items['subtotal']) . "," . 
				
				$this->db->escape($items['name']).")";
				$this->db->query($sql);
				$proizvodi .= "<tr><td style='border: 1px solid green'>" . $items['name'] . "</td><td style='border: 1px solid green'>" . $items['qty'] . "</td><td style='border: 1px solid green'>" . $items['price'] . "</td></tr>";
				$ukupnacena += $items['subtotal'];
			}
			//slanje maila
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);
			//izmeniti mejl from!!! Obavezno serverovu mejl adresu, zbog spama.
			$this->email->from('creepy@neptune.arandomserver.com', 'Apoteka Biljana i Luka');
			$mail = "<html><head></head><body>Adresa elektronske pošte: " . 
			$email . "<br>Ime i prezime: " .
			$name . " " .
			$surname . "<br>Telefon: " .
			$phone . "<br>Adresa: " .
			$address . "<br>Mesto: " .
			$city . "<br> Poštanski broj: " .
			$postal . "<br> Narudžbina<table style='border: 1px solid green'><tr><td style='border: 1px solid green'>Proizvod</td><td style='border: 1px solid green'>količina</td><td style='border: 1px solid green'>cena</td></tr>" .
			$proizvodi . "</table> Ukupno: <b>" . $ukupnacena . " dinara.</b>" .
			"<br><img src='" . base_url() . "/incl/images/logo.gif' alt='Logo apoteke Biljana i Luka'></body></html>";
			
			$this->email->to('goran.blazin@gmail.com');

			$this->email->subject('Narudžbina, sajt apoteke');
			$this->email->message($mail);

			$this->email->send();
			$this->email->to($email);
			$this->email->subject('Narudžbina, sajt apoteke');
			$this->email->send();
			//kraj slanje maila
		}
		return 1;
	}
	
	function unosproizvoda($product_name,$product_price,$description,$image,$category_id)
	{
		$i=0;
		
		if ($product_name!="")
		$i++;
		if ($product_price!="")
		$i++;
		if ($description!="")
		$i++;
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<4)
		{
			return 2;
		} else {
			if($image==""){
				$sql = "INSERT INTO product (product_name,product_price,description,category_id) VALUES(" . 
				$this->db->escape($product_name) . "," . $this->db->escape($product_price) . "," . $this->db->escape($description) . "," . 
				$this->db->escape($category_id) . ")";
			}else{
				$sql = "INSERT INTO product (product_name,product_price,description,image,category_id) VALUES(" . 
				$this->db->escape($product_name) . "," . $this->db->escape($product_price) . "," . $this->db->escape($description) . "," . $this->db->escape($image) . "," . 
				$this->db->escape($category_id) . ")";
			}
			$this->db->query($sql);
			return 1;
		}
		
	}
	
	
	
	function izmenaproizvoda($product_name,$product_price,$description,$image,$category_id,$product_id)
	{
		$greska=1;
		$i=0;
		
		if ($product_name!="")
		$i++;
		if ($product_price!="")
		$i++;
		if ($description!="")
		$i++;
		if ($image!="")
		$i++;
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
	/*
	if($i<5)
		{
			return 2;
		} else {
			*/
			if ($image==""){
				$sql = "UPDATE product SET product_name={$this->db->escape($product_name)},product_price={$this->db->escape($product_price)},description={$this->db->escape($description)},category_id={$this->db->escape($category_id)} WHERE product_id = {$this->db->escape($product_id)}";
				$greska=5;
			}else{
			$sql = "UPDATE product SET product_name={$this->db->escape($product_name)},product_price={$this->db->escape($product_price)},description={$this->db->escape($description)},image={$this->db->escape($image)},category_id={$this->db->escape($category_id)} WHERE product_id = {$this->db->escape($product_id)}";
			}
			$this->db->query($sql);
			return $greska;
		//}
		
	}
	function resizeslike($slika){
		$config['image_library'] = 'gd2';
		$config['source_image'] = $slika;
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 93;
		$config['height'] = 94;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		echo $this->image_lib->display_errors();
	}
	function izmenakategorije($category_id,$category_name)
	{
		$i=0;
		
		if ($category_name!="")
		$i++;
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
	/*
	if($i<5)
		{
			return 2;
		} else {
			*/
			$sql = "UPDATE category SET category_name={$this->db->escape($category_name)} WHERE category_id = {$this->db->escape($category_id)}";
			//echo $sql;
			$this->db->query($sql);
			return 1;
		//}
		
	}
	
	function brisanjeproizvoda($product_id)
	{
	
			$sql = "DELETE FROM product WHERE product_id = {$this->db->escape($product_id)}";
			//echo $sql;
			$this->db->query($sql);
			return 1;
		//}
		
	}
	
	function brisanjekategorije($category_id)
	{
		//$category_id = $this->uri->segment(3);
		$category_id = end($this->uri->segment_array());
		//die ($category_id);
		//$last = $this->uri->total_segments();
		//$category_id = $this->uri->segment($last);
			$sql = "DELETE FROM category WHERE category_id = $category_id";
			$this->db->query($sql);
			//echo $sql;
			//die(  $this->db->_error_number() ); 
			/*
			if ($this->db->query($sql)){
			die(  $this->db->_error_number() );  
			}
			die(  $this->db->_error_number() );  
			*/
			//if()
			return 1;
		//}
		
	}
	
	
}