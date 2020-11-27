<?php  
Class Model_buku extends CI_Model{
	
	function tampilData(){
		return $this->db->get('buku');
	}

	function tampilDataPaging($offset,$perpage){
		$this->db->limit($perpage,$offset);
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('jenis','jenis.IDJenis = buku.IDJenis');
		$this->db->order_by('IDBuku','ASC');
		$data = $this->db->get();
		return $data->result();
	}

	function simpanData(){
		$data = array(
			'IDBuku' => $this->input->post('idbuku'),
			'Judul' => $this->input->post('judul'),
			'Pengarang' => $this->input->post('pengarang'),
			'Terbit' => $this->input->post('terbit'),
			'IDJenis' => $this->input->post('idjenis'));
		$this->db->insert('buku',$data);
	}

	function hapusData($id){
		$this->db->where('IDBuku', $id);
		$this->db->delete('buku');
	}

	function updateData(){
		$data = array(
			'IDBuku' => $this->input->post('idbuku'),
			'Judul' => $this->input->post('judul'),
			'Pengarang' => $this->input->post('pengarang'),
			'Terbit' => $this->input->post('terbit'),
			'IDJenis' => $this->input->post('idjenis'));
		$this->db->where('IDBuku',$this->input->post('idbukulama'));
		$this->db->update('buku',$data);
	}

	function dataPerBuku($id){
		$this->db->where('IDBuku',$id);
		$this->db->join('jenis','buku.IDJenis = jenis.IDJenis');
		return $this->db->get('buku');
	}

	function searchByID($pilihan,$key){
		$this->db->like($pilihan,$key);
		return $this->db->get('buku');
	}
	
	function searchData($pilihan,$key){
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->like($pilihan, $key);
		$this->db->join('jenis', 'jenis.IDJenis = buku.IDJenis');
		$this->db->order_by('IDBuku', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
}
?>