<?php
class Model_narudzbine extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function isporuceno($id)
	{
		if(!($id)){return 2;}
		$sql = "UPDATE orders SET shipped=1 WHERE order_id = {$this->db->escape($id)}";
		$this->db->query($sql);
		return 1;
	}
	function placeno($id)
	{
		if(!($id)){return 2;}
		$sql = "UPDATE orders SET payed=1 WHERE order_id = {$this->db->escape($id)}";
		$this->db->query($sql);
		return 1;
	}
	
}