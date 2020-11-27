<?php  
	Class Model_petugas extends CI_Model{
		function getAllData(){
			return $this->db->get('petugas');
		}

		function login(){
			$pass = $this->input->post('password');
			$user = $this->input->post('username');
			$this->db->select('Password');
			$this->db->where('Username', $user);
			$query = $this->db->get('petugas')->row();
			if (!empty($query->Password)) {
				if ($pass == $query->Password) {
					return 1;
				} else { return 0; }
			} else { return 0; }
		}

		function namaPetugas(){
			$pass = $this->input->post('password');
			$user = $this->input->post('username');
			$this->db->select('*');
			$this->db->where('Username', $user);
			$query = $this->db->get('petugas')->row();
			if (!empty($query->Password)) {
				if ($pass == $query->Password) {
					return $query->NamaPetugas;
				} else { return 0; }
			} else { return 0; }	
		}

		function idPetugas(){
			$pass = $this->input->post('password');
			$user = $this->input->post('username');
			$this->db->select('*');
			$this->db->where('Username', $user);
			$query = $this->db->get('petugas')->row();
			if (!empty($query->Password)) {
				if ($pass == $query->Password) {
					return $query->IDPetugas;
				} else { return 0; }
			} else { return 0; }
		}
	} 
?>