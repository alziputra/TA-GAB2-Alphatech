<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// panggil file "Server.php"
require APPPATH . "libraries/Server.php";

class Kategori extends Server {
    
    // Constructor untuk model
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Mkategori", "kategori_mdl", TRUE);
    }

    // Fungsi GET
    function service_get()
    {
        $token = $this->delete("nama");

        // test menggunakan nama
        $nama = $this->get('nama');

        if ($nama == '') {
            // panggil fungsi get_data
            $kategori = $this->kategori_mdl->get_data(base64_encode($token));
            $this->response(array("Kategori_hidangan" => $kategori), 200);
        } else if ($nama != '') {
            // query where
            $this->db->where("nama", $nama);
            // panggil fungsi get_data
            $kategori = $this->kategori_mdl->get_data(base64_encode($token));
            $this->response(array("Kategori_hidangan" => $kategori), 200);
        } else {
            $this->response(array("status" => "Data Tidak Ditemukan"), 404);
        }
    }

    // Fungsi POST
    function service_post()
    {
        // ambil parameter data yang akan di isi
        $data = array(
            "nama" => $this->post("nama"),
            "foto" => $this->post("foto"),
            "aktif" => $this->post("aktif"),
            "token" => base64_encode($this->post("nama"))
        );

        $hasil = $this->kategori_mdl->save_data($data["nama"], $data["foto"], $data["aktif"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            $this->response(array("status" => "Data Kategori Berhasil di Simpan"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Kategori Gagal di Simpan"), 200);
        }
    }

    // Fungsi PUT
    function service_put()
    {
        // ambil parameter data yang akan di isi
        $data = array(
            "nama" => $this->put("nama"),
            "foto" => $this->put("foto"),
            "aktif" => $this->put("aktif"),
            "token" => base64_encode($this->put("token"))
        );

        // panggil method update_data
        $hasil = $this->kategori_mdl->update_data($data["nama"], $data["foto"], $data["aktif"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            // $kategori = $this->model->get_data();
            // $this->response(array("Kategori_hidangan" => $kategori), 200);
            $this->response(array("status" => "Data Kategori Berhasil di Update"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Kategori Gagal di Update"), 200);
        }
    }

    // Fungsi DELETE
    function service_delete()
    {
        // ambil parameter token "(nama)"
        $token = $this->delete("nama");

        // panggil fungsi "delete_data"
        $hasil = $this->kategori_mdl->delete_data(base64_encode($token));

        // jika proses berhasil
        if ($hasil == 1) {
            $this->response(array("status" => "Data Kategori Berhasil di Hapus"), 200);
        }
        // jika porses gagal
        else {
            $this->response(array("status" => "Data Kategori Gagal di Hapus"), 200);
        }
    }

}

/* End of file Kategori.php */
