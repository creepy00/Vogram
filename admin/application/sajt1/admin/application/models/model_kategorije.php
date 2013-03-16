<?php
class Model_proizvodi extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function kategorije($category_id, $page=0)
	{
		$i=0;
		
		if ($category_id!="")
		$i++;
		
		//izmeniti #i za potreban broj podataka
		if($i<1)
		{
			return 2;
		} else {
			
			$sql = "SELECT * FROM category LIMIT ".(int)$page.",8";
			//echo $sql;
			$query = $this->db->query($sql);
			$j = 0;
			foreach ($query->result_array() as $row)
			{
				$kat[$j]['category_id'] = $row['category_id'];
				$kat[$j]['category_name'] = $row['category_name'];
				$j++;
				
			}
		
		return $kat;
		}
		
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