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
		
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<1)
		{
			return 2;
		} else {
			/*
			$sql = "SELECT category_id FROM category";
			$query = $this->db->query($sql);
			$row = $query->result_array();
			$category_id = $row['category_id'];
			*/
			$sql = "SELECT * FROM product WHERE category_id = ".$this->db->escape($category_id)." LIMIT ".(int)$page.",8";
			//echo $sql;
			$query = $this->db->query($sql);
			$j = 0;
			foreach ($query->result_array() as $row)
			{
				$proizv[$j]['product_id'] = $row['product_id'];
				$proizv[$j]['product_name'] = $row['product_name'];
				$proizv[$j]['product_price'] = $row['product_price'];
				$proizv[$j]['description'] = $row['description'];
				//$image = explode($row['image'])
				//$proizv[$j]['image'] = $row['image'];
				$proizv[$j]['image'] = $row['image'];
				$j++;
				
			}
		
		return $proizv;
		}
		
	}
	
	function prvakategorija()
	{
		$sql = "SELECT category_id as id FROM category";
		$query = $this->db->query($sql);
		//$row = $query->result_array();
			foreach ($query->result_array() as $row){
			return $row['id'];
			}
		//$category_id = $row['id'];
		return 0;
	}
	
	function urlkategorija($category_id)
	{
		$sql = "SELECT * FROM category WHERE category_id = ".$this->db->escape($category_id);
			//echo $sql;
			$query = $this->db->query($sql);
			
			foreach ($query->result_array() as $row){
			return $category_id."-".$row['category_name'];
			}
	}
	function totalproducts($category_id)
	{
		$sql = "SELECT * FROM product WHERE category_id = ".$this->db->escape($category_id);
			//echo $sql;
			$query = $this->db->query($sql);
			return $query->num_rows();
	}
	
}