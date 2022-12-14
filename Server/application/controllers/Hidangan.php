<?php
defined('BASEPATH') or exit('No direct script access allowed');

// panggil file "Server.php"
require APPPATH . "libraries/Server.php";
// require APPPATH."libraries/Server.php";

class Hidangan extends Server
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

        // // panggil model "Mhidangan"
        $this->load->model("Mhidangan", "mHidang", TRUE);
    }

    // buat service "GET"
    function service_get()
    {
        // panggil method "get_data"
        $res = $this->mHidang->get_data();
        // hasil respon
        $this->response(array("hidangan" => $res), 200);
    }

    // buat service "POST"
    function service_post()
    {
        // ambil parameter data yang akan di isi
        $data = array(
            "nama" => $this->post("nama"), //array $data[0]
            "deskripsi" => $this->post("deskripsi"), //array $data[1]
            "harga" => $this->post("harga"), //array $data[2]
            "foto" => $this->post("foto"), //array $data[3]
            "aktif" => $this->post("aktif"), //array $data[4]
            "token" => base64_encode($this->post("nama")),
        );
        // panggil method "save data"
        $res = $this->mHidang->save_data($data["nama"], $data["deskripsi"], $data["harga"], $data["foto"], $data["aktif"], $data["token"]);
        // jika hasil = 0
        if ($res == 0) {
            $this->response(array("status" => "Data Berhasil Disimpan"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Gagal Disimpan"), 200);
        }
    }

    // buat service "PUT"
    function service_put()
    {
       
        // ambil parameter data yang akan di isi
        $data = array(
            "nama" => $this->put("nama"), //array $data[0]
            "deskripsi" => $this->put("deskripsi"), //array $data[1]
            "harga" => $this->put("harga"), //array $data[2]
            "foto" => $this->put("foto"), //array $data[3]
            "aktif" => $this->put("aktif"), //array $data[4]
            "token" => base64_encode($this->put("token")),
        );
        // panggil method "save data"
        $hasil = $this->mHidang->update_data($data["nama"], $data["deskripsi"]
        , $data["harga"], $data["foto"], $data["aktif"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            $this->response(array("status" => "Data Berhasil Di Update"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Gagal Di Update"), 200);
        }
    }


    // buat service "DELETE"
    function service_delete()
    {
        // ambil parameter token "nama"
        $token = $this->delete("nama");
        //    panggil fungsi "delete_data"
        $res = $this->mHidang->delete_data(base64_encode($token));
        if ($res == 1) {
            $this->response(array("status" => "Data Berhasil Dihapus"), 200);
        }
        // jika proses delete gagal
        else {

            $this->response(array("status" => "Data Gagal Dihapus"), 200);
        }
    }
}
