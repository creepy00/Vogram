<?php
//őúšđшђ[]
class Model_admin extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if($this->session->userdata('ulogovan')==0)
		{		
			redirect(base_url("/index.php/login"), 'refresh');
		}
    }
	function novadmin($korime, $lozinka){
		$sql = "SELECT * FROM user WHERE username = '$korime';";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return 2;
		}else{
		$sql = "INSERT INTO user (username,password,isadmin) VALUES ({$this->db->escape($korime)},{$this->db->escape($lozinka)},1);";
		$query = $this->db->query($sql);
		return 1;
		}
	}
	function promenalozinke($korime, $lozinka, $newlozinka){
		$sql = "SELECT * FROM user WHERE username = '$korime' and password = '$lozinka';";
		$query = $this->db->query($sql);
		if ($query->num_rows() != 1) {
			return 3;
		}
		$sql = "UPDATE user SET password={$this->db->escape($newlozinka)} WHERE username={$this->db->escape($korime)}";
		$this->db->query($sql);
		return 5;
	}
	function briskor($user_id){
		$sql = "SELECT * FROM user where user_id = {$this->db->escape($user_id)}";
		//proverava da li korisnik postoji
		$query = $this->db->query($sql);
		if ($query->num_rows() != 1) {
			return 35;
		}
		//proverava da li je veci admin :)
		foreach ($query->result_array() as $row){
			if (!($row['isadmin']<$this->session->userdata('admin'))){
				return 2;
			}
		}
		
		$sql = "DELETE FROM comment WHERE user_id = {$this->db->escape($user_id)}";
			$this->db->query($sql);
		$sql = "DELETE FROM rank WHERE user_id = {$this->db->escape($user_id)}";
			$this->db->query($sql);
		$sql = "DELETE FROM user WHERE user_id = {$this->db->escape($user_id)}";
			$this->db->query($sql);
			return 1;
	}
}