<?php 

	class Controller_auth extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('model_petugas');
		}

		function index(){
			if ($this->session->LoginBang == 'oke') {
				redirect('controller_home');
			} else {
				$this->template->load('login','form_login');
			}
		}

		function login(){
			if (isset($_POST['submit'])) {
				if ($this->model_petugas->login() == 1) {
					$this->session->LoginBang = 'oke';
					$_SESSION['nama'] = $this->model_petugas->namaPetugas();
					$_SESSION['id'] = $this->model_petugas->idPetugas();
					redirect('controller_home');
				} else {
					echo "<p>Login Gagal</p>";
					echo "<p>".anchor('controller_auth','Login Meneh')."</p>";
				}
			} else {
				$this->template->load('login','form_login');
			}
		}

		function logout(){
			session_destroy();
			redirect('controller_auth/login');
		}
	}
?>