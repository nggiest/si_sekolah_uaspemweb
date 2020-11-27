<?php  
	Class Controller_jenis extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('model_jenis');
			ceklogin();
		}

		function index(){
			ceklogin();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/controller_jenis/index';
			$config['total_rows'] = $this->model_jenis->tampilData()->num_rows();
			$config['per_page'] = 4;
			$this->pagination->initialize($config);
			
			$data['paging'] = $this->pagination->create_links();
			$offset = $this->uri->segment(3);
			$data['jenis'] = $this->model_jenis->tampilDataPaging($offset, $config['per_page']);
			$data['jumlah'] = $this->model_jenis->tampilData()->num_rows();

			$this->template->load('template','jenis/index', $data);
		}

		function add(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_jenis->simpanData();
				redirect('controller_jenis');
			} else {
				$data['jenis'] = $this->model_jenis->tampilData()->result();
				$this->template->load('template','jenis/input',$data);
			}
		}

		function delete(){
			ceklogin();
			$id = $this->uri->segment(3);
			$this->model_jenis->hapusData($id);
			redirect('controller_jenis');
		}

		function edit(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_jenis->updateData();
				redirect('controller_jenis');
			} else {
				$id = $this->uri->segment(3);
				$data['jns'] = $this->model_jenis->dataPerBuku($id);
				$data['jenis'] = $this->model_jenis->tampilData()->result();
				$this->template->load('template','jenis/edit',$data);
			}
		}
	}
?>