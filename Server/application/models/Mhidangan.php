<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhidangan extends CI_Model
{

    // buat fungsi "get_data" dari table "tb_hidangan"
    function get_data()
    {
        $this->db->select("id AS id_hidangan, nama AS nama_hidangan, harga AS harga_hidangan, foto AS foto_hidangan, aktif AS aktif_hidangan");
        $this->db->from("tb_hidangan");
        $this->db->order_by("nama", "ASC");
        $query = $this->db->get()->result();

        return $query;
    }

    // buat fungsi untuk save data
    function save_data($nama, $deskripsi, $harga, $foto, $aktif, $token)
    {
        // cek apakah nama hidangan ada atau tidak
        $this->db->select("nama");
        $this->db->from("tb_hidangan");
        $this->db->where("TO_BASE64(nama) = '$token'");

        // eksekusi query
        $query = $this->db->get()->result();
        // jika nama hidangan tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" filed
            $data = array(
                "nama" => $nama,
                "deskripsi" => $deskripsi,
                "harga" => $harga,
                "foto" => $foto,
                "aktif" => $aktif
            );

            // simpan data
            $this->db->insert("tb_hidangan", $data);
            $res = 0;
        }
        //  jika nama ditemukan 
        else {
            $res = 1;
        }
        return $res;
    }

    // fungsi untuk update data
    function update_data($nama, $deskripsi, $harga, $foto, $aktif, $token)
    {
        // cek apakah npm ada atau tidak
        $this->db->select("nama");
        $this->db->from("tb_hidangan");
        $this->db->where("TO_BASE64(nama) != '$token' AND nama = '$nama'");

        // eksekusi query
        $query = $this->db->get()->result();
        // jika nama tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" filed
            $data = array(
                "nama" => $nama,
                "deskripsi" => $deskripsi,
                "harga" => $harga,
                "foto" => $foto,
                "aktif" => $aktif
            );

            // update data hidangan
            $this->db->where("TO_BASE64(nama) = '$token'");
            $this->db->update("tb_hidangan", $data);
            // kirim nilai result = 0
            $res = 0;
        }
        //  jika nama di temukan
        else {
            $res = 1;
        }
        return $res;
    }

    // buat fungsi untuk delete data
    function delete_data($token)
    {
        // cek apakah nama hidangan ada atau tidak
        $this->db->select("nama");
        $this->db->from("tb_hidangan");
        $this->db->where("TO_BASE64(nama) = '$token'");
        // eksekusi query
        $query = $this->db->get()->result();
        // jika nama hidangan ditemukan
        if (count($query) == 1) {
            // hapus data hidangan
            $this->db->where("TO_BASE64(nama) = '$token'");
            $this->db->delete("tb_hidangan");
            // kirim nilai hasil = 1
            $res = 1;
        }
        // jika nama hidangan tidak di temukan
        else {
            // kirim nilai hasil =0
            $res = 0;
        }
        // kirim variabel hasil ke "controler" Hidangan
        return $res;
    }
}
