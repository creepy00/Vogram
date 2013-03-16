<?php
class Model_pretraga extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function pretraga($search, $page){
		$i=0;
		if (strlen($search)<3){
			return false;
		}
		$sql = "SELECT * from product INNER JOIN category ON (`product`.`category_id` = `category`.`category_id`) WHERE product_name LIKE {$this->db->escape('%'.$search.'%')} or description LIKE {$this->db->escape('%'.$search.'%')} ORDER BY product_id LIMIT ".(int)$page.",80";
		$query = $this->db->query($sql);
		if ($query->num_rows() != 0) {
			foreach ($query->result_array() as $row){
					$proizv[$i]['product_id'] = $row['product_id'];
					$proizv[$i]['image'] = $row['image'];
					$proizv[$i]['product_name'] = $row['product_name'];
					$proizv[$i]['product_price'] = $row['product_price'];
					$proizv[$i]['description'] = $row['description'];
					$proizv[$i]['image'] = $row['image'];
					$proizv[$i]['category_id'] = $row['category_id'];
					$i++;
			}
		}
		if ($i==0){ return false; } else {
			return $proizv;
		}
	}
	function pretragaTotal($search){
		$sql = "SELECT count(*) as cou from product INNER JOIN category ON (`product`.`category_id` = `category`.`category_id`) WHERE product_name LIKE {$this->db->escape('%'.$search.'%')} or description LIKE {$this->db->escape('%'.$search.'%')} ORDER BY product_id";
		$query = $this->db->query($sql);
		if ($query->num_rows() != 0) {
			foreach ($query->result_array() as $row){
				return $row['cou'];
			}
		}
		return 0;
	}
}