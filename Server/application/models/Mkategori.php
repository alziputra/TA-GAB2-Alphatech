<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mkategori extends CI_Model
{
    // Fungsi untuk tampil data
    function get_data($token)
    {
        // keamanan menggunakan alias pada database
        $this->db->select("
            id AS id_kategori,
            nama AS nama_kategori,
            foto AS foto hidangan,
            aktif AS aktif_kategori
        ");

        $this->db->from("tb_kategori");

        // jika token terisi
        // if($token != "") {} opsi lain
        if (!empty($token)) {
            $this->db->where("TO_BASE64(nama) = '$token' OR TO_BASE64(nama) = '$token' ");
        }

        $this->db->order_by("nama", "DESC");

        $query = $this->db->get()->result();
        return $query;
    }
    

    function delete_data($token)
    {
        // check apakah nama ada / tidak
        $this->db->select("nama");
        $this->db->from("tb_kategori");
        // $this->db->where("nama = '$token'");
        $this->db->where("TO_BASE64(nama) = '$token'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika nama ditemukan
        if (count($query) == 1) {
            // $this->db->where("nama = '$token'");
            $this->db->where("TO_BASE64(nama) = '$token'");
            $this->db->delete("tb_kategori");

            // kirim nilai 1
            // $hasil = "Y";
            $hasil = 1;
        }
        // jika nama tidak ditemukan
        else {
            // kirim nilai hasil 0
            // $hasil = "X";
            $hasil = 0;
        }
        // kirim variabel hasil ke controller Kategori
        return $hasil;
    }

    // buat fungsi simpan data
    function save_data($nama, $foto, $aktif, $token)
    {
        // check apakah nama ada / tidak
        $this->db->select("nama");
        $this->db->from("tb_kategori");
        // $this->db->where("nama = '$token'");
        $this->db->where("TO_BASE64(nama) = '$token'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika nama tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" field
            $data = array(
                "nama" => $nama,
                "foto" => $foto,
                "aktif" => $aktif,
            );

            // simpan data
            $this->db->insert("tb_kategori", $data);
            $hasil = 0;
        }
        // jika nama ditemukan
        else {
            $hasil = 1;
        }

        return $hasil;
    }

    // fungsi untuk ubah data
    function update_data($nama, $foto, $aktif, $token)
    {
        // check apakah nama ada / tidak
        $this->db->select("nama");
        $this->db->from("tb_kategori");
        // $this->db->where("nama = '$token'");
        // nama (encode) and nama = nama
        // nama != 22 and nnamapm = 55 (result = 0)
        $this->db->where("TO_BASE64(nama) != '$token' AND nama = '$nama'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika nama tidak ditemukan
        if (count($query) == 0) {
            $data = array(
                "nama" => $nama,
                "foto" => $foto,
                "aktif" => $aktif,
            );

            // $this->db->where("TO_BASE64(nama) != '$token' AND nama = '$nama'");
            $this->db->where("TO_BASE64(nama) = '$token'");
            // , $data untuk mengirim data dari parameter
            $this->db->update("tb_kategori", $data);
            // kirim nilai $hasil = 0;
            $hasil = 0;
        } else {
            $hasil = 1;
        }

        return $hasil;
    }
    

}

/* End of file Mkategori.php */