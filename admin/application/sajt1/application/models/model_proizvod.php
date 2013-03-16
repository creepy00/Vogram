<?php
class Model_proizvod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function proizvod($product_id)
	{
		
			$sql = "SELECT * FROM product WHERE product_id = ".$this->db->escape($product_id)."";
			//echo $sql;
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				$proizv['product_id'] = $row['product_id'];
				$proizv['image'] = $row['image'];
				$proizv['product_name'] = $row['product_name'];
				$proizv['product_price'] = $row['product_price'];
				$proizv['description'] = $row['description'];
				$proizv['image'] = $row['image'];
			}
		
		return $proizv;
	}
	
	function unesikomentar($user_id,$komentar,$product_id){	
		$sql = "INSERT INTO comment (user_id,comment,datetime,product_id) VALUES(" . 
			$user_id . "," . $this->db->escape($komentar) . ",NOW()," . $this->db->escape($product_id) . ")";
			$this->db->query($sql);
			return 1;
	}
	function komentari($idproizvoda){
		//$sql = "select * from comment where product_id = " . $this->db->escape($idproizvoda) . ";";
		$i=0;
		$sql = "select * from comment inner join user on comment.user_id = user.user_id where product_id = " . $this->db->escape($idproizvoda) . ";";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				$proizv[$i]['comment'] = $row['comment'];
				$proizv[$i]['datetime'] = $row['datetime'];
				$proizv[$i]['username'] = $row['username'];
				$i++;
			}
			if($i == 0){
				return false;
			} else {
				return $proizv;
			}
	}
	function setthumb($product, $val, $user){
		$sql = "select * from rank where user_id = " . $user . " and product_id = " . $product . ";";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			return false;
		}
		if ($val>0){$rank=1;} else {$rank=-1;}
		$sql = "INSERT INTO rank (product_id,rank,user_id) VALUES(" . 
			$this->db->escape($product) . "," . $this->db->escape($rank) . "," . $this->db->escape($user) . ")";
		$query = $this->db->query($sql);
		return 1;
	}
	function thumbsUpDown($id){
		$sql = "select sum(rank) as sumrank from rank where product_id = " . $this->db->escape($id) . ";";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row){
			if($row['sumrank']==0){
				return 0;
			} else {
			return $row['sumrank'];
			}
		}
	}
	
}