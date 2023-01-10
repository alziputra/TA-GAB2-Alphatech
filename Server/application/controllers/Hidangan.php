<?php
defined('BASEPATH') or exit('No direct script access allowed');

// panggil file "Server.php"
require APPPATH . "libraries/Server.php";

class Hidangan extends Server
{

    // membuat constructor untuk model
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Mhidangan", "mdl", TRUE);
    }

    // keyword service_ ada di libraries/server line 684
    // membuat fungsi GET
    function service_get()
    {
        $token = $this->delete("menu");

        // test menggunakan menu
        $menu = $this->get('menu');

        if ($menu == '') {
            // panggil fungsi get_data
            $hidang = $this->mdl->get_data(base64_encode($token));
            $this->response(array("hidangan" => $hidang), 200);
        } else if ($menu != '') {
            // query where
            $this->db->where("menu", $menu);
            // panggil fungsi get_data
            $hidang = $this->mdl->get_data(base64_encode($token));
            $this->response(array("hidangan" => $hidang), 200);
        } else {
            $this->response(array("status" => "Data Tidak Ditemukan"), 404);
        }
    }


    // untuk get username
    // function service_get()
    // {
    //     $username = $this->get("username");
    //     $hasil = $this->model->get_data($username);

    //     $this->response(array("auth" => $hasil), 200);
    // }

    // membuat fungsi POST
    function service_post()
    {
        // panggil model hidangan
        // $this->load->model("Mhidangan", "model", TRUE);

        // ambil parameter data yang akan di isi
        $data = array(
            "menu" => $this->post("menu"),
            "deskripsi" => $this->post("deskripsi"),
            "harga" => $this->post("harga"),
            "aktif" => $this->post("aktif"),
            "token" => base64_encode($this->post("menu"))
        );

        // array prosedural contoh
        // $data["menu"] = $this->post("menu");
        // $menu = $this->post("menu");

        // panggil method save_data
        // $hasil = $this->model->save_data();

        $hasil = $this->mdl->save_data($data["menu"], $data["deskripsi"], $data["harga"], $data["aktif"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            $this->response(array("status" => "Data Hidangan Berhasil di Simpan"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Hidangan Gagal di Simpan"), 200);
        }
    }

    // membuat fungsi PUT
    function service_put()
    {
        // panggil model hidangan
        // $this->load->model("Mhidangan", "model", TRUE);

        // ambil parameter data yang akan di isi
        $data = array(
            "menu" => $this->put("menu"),
            "deskripsi" => $this->put("deskripsi"),
            "harga" => $this->put("harga"),
            "aktif" => $this->put("aktif"),
            "token" => base64_encode($this->put("token"))
        );

        // panggil method update_data
        $hasil = $this->mdl->update_data($data["menu"], $data["deskripsi"], $data["harga"], $data["aktif"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            // $hidang = $this->model->get_data();
            // $this->response(array("hidangan" => $hidang), 200);
            $this->response(array("status" => "Data Hidangan Berhasil di Update"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Hidangan Gagal di Update"), 200);
        }
    }

    // membuat fungsi DELETE
    function service_delete()
    {
        // panggil model hidangan
        // $this->load->model("Mhidangan", "mdl", TRUe);

        // ambil parameter token "(menu)"
        $token = $this->delete("menu");

        // panggil fungsi "delete_data"
        $hasil = $this->mdl->delete_data(base64_encode($token));

        // jika proses berhasil
        if ($hasil == 1) {
            $this->response(array("status" => "Data Hidangan Berhasil di Hapus"), 200);
        }
        // jika porses gagal
        else {
            $this->response(array("status" => "Data Hidangan Gagal di Hapus"), 200);
        }
    }
}
