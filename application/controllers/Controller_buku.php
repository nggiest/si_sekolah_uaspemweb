<?php  
	Class Controller_buku extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('model_buku');
			$this->load->model('model_jenis');
			ceklogin();
		}

		function index(){
			ceklogin();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/controller_buku/index';
			$config['total_rows'] = $this->model_buku->tampilData()->num_rows();
			$config['per_page'] = 4;
			$this->pagination->initialize($config);
			
			$data['paging'] = $this->pagination->create_links();
			$offset = $this->uri->segment(3);
			$data['buku'] = $this->model_buku->tampilDataPaging($offset, $config['per_page']);
			$data['jumlah'] = $this->model_buku->tampilData()->num_rows();

			$this->template->load('template','buku/index', $data);
		}

		function add(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_buku->simpanData();
				redirect('controller_buku');
			} else {
				$data['jenis'] = $this->model_jenis->tampilData()->result();
				$this->template->load('template','buku/input',$data);
			}
		}

		function delete(){
			ceklogin();
			$id = $this->uri->segment(3);
			$this->model_buku->hapusData($id);
			redirect('controller_buku');
		}

		function edit(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_buku->updateData();
				redirect('controller_buku');
			} else {
				$id = $this->uri->segment(3);
				$data['buku'] = $this->model_buku->dataPerBuku($id);
				$data['jenis'] = $this->model_jenis->tampilData()->result();
				$this->template->load('template','buku/edit',$data);
			}
		}

		function search(){
			ceklogin();
			if (isset($_POST['search'])) {
				$pilihan = $this->input->post('pilihan');
				$key = $this->input->post('key');
			}
			if (empty($key)) {
				redirect('controller_buku');
			}
			$data['buku'] = $this->model_buku->searchData($pilihan,$key);
			$data['jumlah'] = $this->model_buku->searchByID($pilihan,$key)->num_rows();
			$this->template->load('template','buku/searchresult',$data);

			
		}
	}
?>