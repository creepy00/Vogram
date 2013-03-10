<?php

class Akcija_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }


  /**
   * Uzmi akciju po id-u
   *
   * @param int $id
   */
  function findById($id) {
    $akcije =$this->db->query('SELECT * FROM projects WHERE id = ?', array($id));

    return $akcije->first_row();
  } //findById

  /**
   * Pronadji sve akcije
   */
  function findAll() {
    $akcije =$this->db->query('SELECT * FROM projects WHERE type = ?', array(PROJEKAT_AKCIJA));

    return $akcije->result();
  } //findAll


}