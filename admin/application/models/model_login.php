<?php
class Model_login extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function loginupit($korime, $lozinka)
	{
	$sql = "SELECT isadmin FROM user WHERE username = '$korime' and password = '$lozinka' and isadmin > 0;";
	$query = $this->db->query($sql);
	if ($query->num_rows() == 0) {
			return 0;
		} else {
	$row = $query->row();
	return $row->isadmin;
	}
	}
}