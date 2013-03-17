<?php
class Model_brisanje extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function brisproj($id){
		$sql = "SELECT * FROM projects where id = {$this->db->escape($id)}";
		$query = $this->db->query($sql);
		if ($query->num_rows() != 1) {
			return 35;
		}
		
		$sql = "DELETE FROM projects WHERE id = {$this->db->escape($id)}";
			$this->db->query($sql);
			return 1;
	}
}
?>