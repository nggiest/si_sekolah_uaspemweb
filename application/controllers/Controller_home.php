<?php  
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Controller_home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('model_buku');
		$this->load->model('model_member');
		$this->load->model('model_peminjaman');
		$this->load->model('model_jenis');
	}

	function index(){
		ceklogin();
		$data['member'] = $this->model_member->tampilData()->num_rows();
		$data['peminjaman'] = $this->model_peminjaman->tampilData()->num_rows();
		$data['buku'] = $this->model_buku->tampilData()->num_rows();
		$data['jenis'] = $this->model_jenis->tampilData()->num_rows();
		$this->template->load('template','home_view', $data);
	}
}
?>