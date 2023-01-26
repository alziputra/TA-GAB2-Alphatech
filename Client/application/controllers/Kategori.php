<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function index()
    {
        $this->load->view('v_kategori', $data, FALSE);
        
    }

}

/* End of file Kategori.php */
