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

		$this->load->view('v_hidangan', $data);
	}
}
