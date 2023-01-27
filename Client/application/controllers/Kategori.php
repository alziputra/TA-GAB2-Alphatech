<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/partials/header');
		$this->load->view('admin/kategori/v_kategori');
		$this->load->view('admin/partials/footer');
        
    }

}

/* End of file Kategori.php */
