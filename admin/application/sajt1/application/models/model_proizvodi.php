<?php
class Model_proizvodi extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function proizvodikategorija($category_id, $page=0)
	{
		$i=0;
		
		if ($category_id!=""){
		$i++;
		}
		//izmeniti #i za potreban broj podataka
		if($i<1)
		{
			return 2;
		} else {
			$sql = "SELECT * FROM product WHERE category_id = ".$this->db->escape($category_id)." LIMIT ".(int)$page.",8";
			
			$query = $this->db->query($sql);
			$j = 0;
			foreach ($query->result_array() as $row)
			{
				$proizv[$j]['product_id'] = $row['product_id'];
				$proizv[$j]['product_name'] = $row['product_name'];
				$proizv[$j]['product_price'] = $row['product_price'];
				$proizv[$j]['description'] = nl2br($row['description']);
				$proizv[$j]['image'] = $row['image'];
				$j++;
				
			}
		
		return @$proizv;
		}
		
	}
	
	function prvakategorija()
	{
		$sql = "SELECT category_id as id FROM category";
		$query = $this->db->query($sql);
			foreach ($query->result_array() as $row){
			return $row['id'];
			}
		return 0;
	}
	
	
	function urlkategorija($category_id)
	{
		$sql = "SELECT * FROM category WHERE category_id = ".$this->db->escape($category_id);
			$query = $this->db->query($sql);
			
			foreach ($query->result_array() as $row){
			return $category_id."-".$row['category_name'];
			}
	}
	function totalproducts($category_id)
	{
		$sql = "SELECT * FROM product WHERE category_id = ".$this->db->escape($category_id);
			$query = $this->db->query($sql);
			return $query->num_rows();
	}
	
	
	function meni_kategorije($izabranakategorija){
	
	
		$sql = "SELECT * FROM category ORDER BY category_name";
			
		$query = $this->db->query($sql);
		$menilink = "";
		foreach ($query->result_array() as $row){
				$link = site_url('proizvodi/kategorija/' . $row['category_id']);
				if($izabranakategorija==$row['category_id']){
					$category_name = $row['category_name'];
					$menilink .= '<a href="' . $link . '" class="button_text_selected"><span id="category_button">' . $row['category_name'] . '</span></a>';
				}else{
					$menilink .= '<a href="' . $link . '" class="button_text"><span id="category_button">' . $row['category_name'] . '</span></a>';
				}
		}
		return $menilink;
	}
	function prikazslikakategorija($id_kategorija)
	{
		$sql = "SELECT image from category_images WHERE category_id = {$id_kategorija}";
		$slika = "";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			foreach ($query->result_array() as $row){
				$slika .= "<img src='" . base_url("/uploads/slikekategorije/" . $row['image']) . "' alt='slika proizvoda' class='product_img'>";
			}
		} else {return false;}
		return $slika;
	}
	function prikazimekategorija($id_kategorija)
	{
		$sql = "SELECT * from category WHERE category_id = {$id_kategorija}";
		$ime = "";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			foreach ($query->result_array() as $row){
				$ime .= $row['category_name'];
			}
		} else {return false;}
		return $ime;
	}

}