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
	
	function unosregistracija($username,$password,$email)
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
			
			$sql = "INSERT INTO user (username,password,email) VALUES(" . 
			$this->db->escape($username) . "," . $this->db->escape($password) . "," . $this->db->escape($email) . ")";
			$this->db->query($sql);
			return 1;
		}
		
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
		$config['width'] = 158;
		$config['height'] = 158;

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
			$sql = "SELECT image from product WHERE product_id = {$this->db->escape($product_id)}";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row){
			if ($row['image']!=""){
					
				unlink (dirname(__FILE__). '/../../../uploads/' . $row['image']);
			}
			}
			$sql = "DELETE FROM comment WHERE product_id = {$this->db->escape($product_id)}";
			$this->db->query($sql);
			$sql = "DELETE FROM rank WHERE product_id = {$this->db->escape($product_id)}";
			$this->db->query($sql);
			$sql = "DELETE FROM product WHERE product_id = {$this->db->escape($product_id)}";
			//echo $sql;
			$this->db->query($sql);
			return 1;
		//}
		
	}

	function brisanjekategorije($category_id)
	{
			$sql = "SELECT image from category_images WHERE category_id = {$this->db->escape($category_id)}";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row){
			if ($row['image']!=""){
					
				unlink (dirname(__FILE__). '/../../../uploads/slikekategorije/' . $row['image']);
			}
			}
			$sql = "DELETE FROM category_images WHERE category_id = $category_id";
			$this->db->query($sql);
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
	
	function isproizvodkategorija($category_id)
	{
		
			$sql = "SELECT category_id FROM product WHERE category_id = ".$category_id.";";
			$query = $this->db->query($sql);
			
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
			
			return 1;
		//}
		
	}
	
	function pretraganaziv($product_name){
	
		$sql = "SELECT * from product INNER JOIN category ON (`product`.`category_id` = `category`.`category_id`) WHERE product_name LIKE {$this->db->escape('%'.$product_name.'%')} ORDER BY product_id";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 0) {
				return false;
		}
		$menu="";
		foreach ($query->result_array() as $row){
			$menu .= '<tr id="'.$row['product_id'].'">';
			$menu .= '<td>' . $row['product_id'] . '</td><td>' . $row['product_name'] . '</td><td>' . $row['product_price'] . '</td><td>' . $row['description'] . '</td><td>
			<img width="20px" height="20px" src="'. base_url().'../uploads/' . $row['image'] . '"></td><td>' . $row['image'] . '</td><td>' . $row['category_name'] . '<td onClick="Crud(this);"><img src="'. base_url().'/incl/images2/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
			$menu .= '</tr>';
		}
		return $menu;
	}

	function pretragaopis($description){
		$sql = "SELECT * from product INNER JOIN category ON (`product`.`category_id` = `category`.`category_id`) WHERE description LIKE {$this->db->escape('%'.$description.'%')} ORDER BY product_id";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 0) {
				return false;
		}
		$menu="";
		foreach ($query->result_array() as $row){
			$menu .= '<tr id="'.$row['product_id'].'">';
			$menu .= '<td>' . $row['product_id'] . '</td><td>' . $row['product_name'] . '</td><td>' . $row['product_price'] . '</td><td>' . $row['description'] . '</td><td>
			<img width="20px" height="20px" src="'. base_url().'../uploads/' . $row['image'] . '"></td><td>' . $row['image'] . '</td><td>' . $row['category_name'] . '<td onClick="Crud(this);"><img src="'. base_url().'/incl/images2/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
			$menu .= '</tr>';
		}
		return $menu;
	}
	
	function unosslikekategorije($category_id,$image)
	{
		$i=0;

		if ($image!="")
		$i++;
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<2)
		{
			return 3;
		} else {
			if($image==""){
				return 2;
			}else{
				$sql = "INSERT INTO category_images (category_id,image) VALUES(" . 
				$this->db->escape($category_id) . "," . $this->db->escape($image) . ")";
			}
			$this->db->query($sql);
			return 1;
		}
		
	}
	function resizeslikekategorije($slika){
		$config['image_library'] = 'gd2';
		$config['source_image'] = $slika;
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		echo $this->image_lib->display_errors();
	}
	function brisanjeslike($id){
		$sql = "SELECT image from category_images WHERE id = {$this->db->escape($id)}";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row){
			if ($row['image']!=""){
					
				unlink (dirname(__FILE__). '/../../../uploads/slikekategorije/' . $row['image']);
			}
			}
			
			$sql = "DELETE FROM category_images WHERE id = {$this->db->escape($id)}";
			//echo $sql;
			$this->db->query($sql);
			return 1;
		//}
	}
	function brisikomentar($comment_id){
		$sql = "SELECT comment_id from comment WHERE comment_id = {$this->db->escape($comment_id)}";
			$query = $this->db->query($sql);
						
			$sql = "DELETE FROM comment WHERE comment_id = {$this->db->escape($comment_id)}";
			//echo $sql;
			$this->db->query($sql);
			return 1;
		//}
	}
	
}