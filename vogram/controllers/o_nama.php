<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class O_nama extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   */
  public function index()
  {
    $this->load->view('layout', array('mirko' => 'o-nama'));
    $this->load->view('o_nama/o_nama_view');
    $this->load->view('footer');
  }

  public function mirko() {
    $this->load->view('o_nama/o_mirku_view');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */