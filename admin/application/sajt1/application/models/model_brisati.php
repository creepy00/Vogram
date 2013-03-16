<?php
class Model_brisati extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function brisanjeprozivoda($page)
	{
		echo $page.' '.echo $product_id;
			$sql = "DELETE FROM product WHERE product_id = {$this->db->escape($product_id)}";
			$this->db->query($sql);
			//return 1;
		//}
		
	}
	
	
}