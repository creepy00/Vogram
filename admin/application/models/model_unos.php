<?php
class Model_unos extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function unosprojekta($type,$text,$video_link,$links,$sinopsis,$name)
	{
		$i=0;
		
		if ($type!="")
		$i++;
		if ($text!="")
		$i++;
		/*
		if ($video_link!="")
		$i++;
		if ($links!="")
		$i++;
		*/		
		if ($sinopsis!="")
		$i++;		
		if ($name!="")
		$i++;
		
		//izmeniti $i za potreban broj podataka
		if($i<4)
		{
			return 2;
		} else {
				$sql = "INSERT INTO projects (type,text,video_link,links,sinopsis,name) VALUES(" . 
				$this->db->escape($type) . "," . $this->db->escape($text) . "," . $this->db->escape($video_link) . "," . $this->db->escape($links) . "," . $this->db->escape($sinopsis) . "," . 
				$this->db->escape($name) . ")";
		}
			$this->db->query($sql);
			return 1;
	}
	
}