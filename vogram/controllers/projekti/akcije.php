<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akcije extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('projekti/akcija_model');

  }

  public function index()
  {
    $akcije = $this->akcija_model->findAll();

    $data = array(
      'akcije' => $akcije,
    );

    $this->load->view('layout', array('mirko' => 'o-nama'));
    $this->load->view('projekti/akcije/index_akcije_view', $data);
    $this->load->view('footer');
  }

  public function view($id = null) {
    if ($id) {
      $data = array(
        'akcija' => $this->akcija_model->findById($id),
      );
      $this->load->view('layout', array('mirko' => 'o-nama'));
      $this->load->view('projekti/akcije/akcija_text_view', $data);
      $this->load->view('footer');
    } else {
      show_404();
    } //if
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */