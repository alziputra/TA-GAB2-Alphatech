<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hidangan extends CI_Controller
{

	public function index()
	{
		$data['tampil'] = json_decode(
			$this->client->simple_get(APIHIDANGAN)
		);

		// foreach ($data["tampil"]->hidangan as $result) {
		// 	# code...
		// 	echo $result->nama_hidangan . "<br>";
		// }
		$this->load->view('admin/partials/header');
		$this->load->view('admin/hidangan/v_hidangan', $data);
		$this->load->view('admin/partials/footer');
	}
	
	function addHidangan()
	{
		$this->load->view('admin/partials/header');
		$this->load->view('admin/hidangan/v_hidangan_add');
		$this->load->view('admin/partials/footer');
	}

	//=====================fungsi untuk simpan data==================//
	function setSave()
	{
		// baca nilai dari fetch
		// menggunakan $data array
		$data = array(
			"menu" => $this->input->post("menuhidangan"),
			"deskripsi" => $this->input->post("deskhidangan"),
			"harga" => $this->input->post("hargahidangan"),
			"aktif" => $this->input->post("aktifhidangan"),
			"token" => $this->input->post("menuhidangan")
		);

		$save = json_decode(
			$this->client->simple_post(APIHIDANGAN, $data)
		);

		echo json_encode(array("statusnya" => $save->status));
	}

	//====================fungsi untuk menampilkan data=====================//
	function updateHidangan()
	{

		// ambil nilai menu
		$token = $this->uri->segment(3);
		// echo $token;

		$tampil = json_decode(
			$this->client->simple_get(
				APIHIDANGAN,
				array(
					"menu" => $token
				)
			)
		);

		foreach ($tampil->hidangan as $result) {
			// echo $result->npm_mhs."<br>";
			$data = array(
				"menu" => $result->menu_hidangan,
				"deskripsi" => $result->deskripsi_hidangan,
				"harga" => $result->harga_hidangan,
				"aktif" => $result->aktif_hidangan,
				"token" => $token
			);
		}
		$this->load->view('admin/partials/header');
		$this->load->view('admin/hidangan/v_hidangan_edit');
		$this->load->view('admin/partials/footer');
	}

	// fungsi update hidangan
	function setUpdate()
	{
		// baca nilai dari fetch
		// menggunakan $data array
		$data = array(
			"menu" => $this->input->post("menuhidangan"),
			"deskripsi" => $this->input->post("deskhidangan"),
			"harga" => $this->input->post("hargahidangan"),
			"aktif" => $this->input->post("aktifhidangan"),
			"token" => $this->input->post("tokenhidangan")
		);

		$update = json_decode(
			$this->client->simple_put(APIHIDANGAN, $data)
		);

		echo json_encode(array("statusnya" => $update->status));
	}




	function setDelete()
	{
		// buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);

		$delete = json_decode(
			$this->client->simple_delete(
				APIHIDANGAN,
				array(
					"menu" => $hasil->menuhidangan
				)
			)
		);

		echo json_encode(array("statusnya" => $delete->status));
	}

}


/* End of file Hidangan.php */
