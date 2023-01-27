<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhidangan extends CI_Model
{
    // buat method untuk tampil data
    function get_data($token)
    {
        // keamanan menggunakan alias pada database
        $this->db->select("
            id AS id_hidangan,
            menu AS menu_hidangan,
            deskripsi AS deskripsi_hidangan,
            harga AS harga_hidangan,
            aktif AS aktif_hidangan
        ");

        $this->db->from("tb_hidangan");

        // jika token terisi
        // if($token != "") {} opsi lain
        if (!empty($token)) {
            $this->db->where("TO_BASE64(menu) = '$token' OR TO_BASE64(menu) = '$token' ");
        }

        $this->db->order_by("menu", "DESC");

        $query = $this->db->get()->result();
        return $query;
    }
    

    function delete_data($token)
    {
        // check apakah menu ada / tidak
        $this->db->select("menu");
        $this->db->from("tb_hidangan");
        // $this->db->where("menu = '$token'");
        $this->db->where("TO_BASE64(menu) = '$token'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika menu ditemukan
        if (count($query) == 1) {
            // $this->db->where("menu = '$token'");
            $this->db->where("TO_BASE64(menu) = '$token'");
            $this->db->delete("tb_hidangan");

            // kirim nilai 1
            // $hasil = "Y";
            $hasil = 1;
        }
        // jika menu tidak ditemukan
        else {
            // kirim nilai hasil 0
            // $hasil = "X";
            $hasil = 0;
        }
        // kirim variabel hasil ke controller Hidangan
        return $hasil;
    }

    // buat fungsi simpan data
    function save_data($menu, $deskripsi, $harga, $aktif, $token)
    {
        // check apakah menu ada / tidak
        $this->db->select("menu");
        $this->db->from("tb_hidangan");
        // $this->db->where("menu = '$token'");
        $this->db->where("TO_BASE64(menu) = '$token'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika menu tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" field
            $data = array(
                "menu" => $menu,
                "deskripsi" => $deskripsi,
                "harga" => $harga,
                "aktif" => $aktif,
            );

            // simpan data
            $this->db->insert("tb_hidangan", $data);
            $hasil = 0;
        }
        // jika menu ditemukan
        else {
            $hasil = 1;
        }

        return $hasil;
    }

    // fungsi untuk ubah data
    function update_data($menu, $deskripsi, $harga, $aktif, $token)
    {
        // check apakah menu ada / tidak
        $this->db->select("menu");
        $this->db->from("tb_hidangan");
        // $this->db->where("menu = '$token'");
        // menu (encode) and menu = menu
        // menu != 22 and nmenupm = 55 (result = 0)
        $this->db->where("TO_BASE64(menu) != '$token' AND menu = '$menu'");

        // eksekusi query
        $query = $this->db->get()->result();

        // jika menu tidak ditemukan
        if (count($query) == 0) {
            $data = array(
                "menu" => $menu,
                "deskripsi" => $deskripsi,
                "harga" => $harga,
                "aktif" => $aktif,
            );

            // $this->db->where("TO_BASE64(menu) != '$token' AND menu = '$menu'");
            $this->db->where("TO_BASE64(menu) = '$token'");
            // , $data untuk mengirim data dari parameter
            $this->db->update("tb_hidangan", $data);
            // kirim nilai $hasil = 0;
            $hasil = 0;
        } else {
            $hasil = 1;
        }

        return $hasil;
    }
}
