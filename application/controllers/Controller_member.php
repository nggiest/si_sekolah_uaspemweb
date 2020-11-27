<?php  
	Class Controller_member extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('model_member');
			ceklogin();
		}

		function index(){
			ceklogin();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/controller_member/index';
			$config['total_rows'] = $this->model_member->tampilData()->num_rows();
			$config['per_page'] = 4;
			$this->pagination->initialize($config);
			
			$data['paging'] = $this->pagination->create_links();
			$offset = $this->uri->segment(3);
			$data['member'] = $this->model_member->tampilDataPaging($offset, $config['per_page']);
			$data['jumlah'] = $this->model_member->tampilData()->num_rows();

			$this->template->load('template','member/index', $data);
		}

		function add(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_member->simpanData();
				redirect('controller_member');
			} else {
				$data['member'] = $this->model_member->tampilData()->result();
				$this->template->load('template','member/input',$data);
			}
		}

		function delete(){
			ceklogin();
			$id = $this->uri->segment(3);
			$this->model_member->hapusData($id);
			redirect('controller_member');
		}

		function edit(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_member->updateData();
				redirect('controller_member');
			} else {
				$id = $this->uri->segment(3);
				$data['member'] = $this->model_member->dataPerBuku($id);
				//$data['jenis'] = $this->model_jenis->tampilData()->result();
				$this->template->load('template','member/edit',$data);
			}
		}

		function search(){
			ceklogin();
			if (isset($_POST['search'])) {
				$pilihan = $this->input->post('pilihan');
				$key = $this->input->post('key');
			}
			if (empty($key)) {
				redirect('controller_member');
			}
			$data['member'] = $this->model_member->searchData($pilihan,$key);
			$data['jumlah'] = $this->model_member->searchByID($pilihan,$key)->num_rows();
			$this->template->load('template','member/searchresult',$data);
		}
	}
?>