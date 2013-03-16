<?php
class Model_login extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function loginupit($korime, $lozinka)
	{
		$sql = "SELECT COUNT(*),max(user_id) as brkor FROM user WHERE username = '$korime' and password = '$lozinka';";
		//die($sql);
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->brkor;
	}
	function placanjepodaci($userid)
	{
		$sql = "SELECT * FROM user WHERE user_id = '$userid';";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row;
	}
}