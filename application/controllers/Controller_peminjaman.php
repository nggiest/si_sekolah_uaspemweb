<?php  
	Class Controller_peminjaman extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_buku');
			$this->load->model('model_member');
			$this->load->model('model_peminjaman');
			ceklogin();
		}

		function index(){
			ceklogin();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/controller_peminjaman/index';
			$config['total_rows'] = $this->model_peminjaman->tampilData()->num_rows();
			$config['per_page'] = 4;
			$this->pagination->initialize($config);
			
			$offset = $this->uri->segment(3);
			$data['paging'] = $this->pagination->create_links();
			$data['peminjaman'] = $this->model_peminjaman->tampilDataPaging($offset, $config['per_page']);
			$data['jumlah'] = $this->model_peminjaman->tampilData()->num_rows();
			$data['blmkembali'] = $this->model_peminjaman->belumKembali()->num_rows();
			$this->template->load('template','peminjaman/index', $data);
		}

		function cariDataPeminjaman(){
			ceklogin();
			$data['buku'] = $this->model_buku->tampilData()->result();
			$data['member'] = $this->model_member->tampilData()->result();
			$this->template->load('template','peminjaman/cariDataPinjam',$data);
		}

		function delete(){
			ceklogin();
			$id = $this->uri->segment(3);
			$this->model_peminjaman->hapusData($id);
			redirect('controller_peminjaman');
		}

		function add(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_peminjaman->simpanData();
				redirect('controller_peminjaman');
			} else {
				$data['buku'] = $this->model_buku->tampilData()->result();
				$data['member'] = $this->model_member->tampilData()->result();
				$data['sekarang'] = date('Y-m-d');
				$data['kembali'] = date('Y-m-d', strtotime('+7 days', strtotime($data['sekarang'])));
				$data['idpetugas'] = $_SESSION['id'];
				$this->template->load('template','peminjaman/input', $data);
			}
		}
		

		function edit(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$this->model_peminjaman->updateData();
				$id = $this->input->post('idpeminjaman');
				$data['id'] = $this->model_peminjaman->dataPerPinjam($id);
				$this->template->load('template','peminjaman/hasilPengembalian',$data);
			}
		}

		function search(){
			ceklogin();
			if (isset($_POST['submit'])) {
				$idbuku = $this->input->post('idbuku');
				$idmember = $this->input->post('idmember');
				$data['peminjaman'] = $this->model_peminjaman->tampilData()->result();
				$data['showblmkembali'] = $this->model_peminjaman->cariData($idbuku, $idmember);
				$this->template->load('template', 'peminjaman/showDataPinjam', $data);
			}
		}
	}
?>