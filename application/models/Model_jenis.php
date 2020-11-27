<?php  
Class Model_jenis extends CI_Model{
	
	function tampilData(){
		return $this->db->get('jenis');
	}

	function getAllIDJenis(){
		$this->db->select('IDJenis');
		return $this->db->get('jenis');
	}

	function tampilDataPaging($offset,$perpage){
		$this->db->limit($perpage,$offset);
		$this->db->order_by('IDJenis','ASC');
		$data = $this->db->get('jenis');
		return $data->result();
	}

	function simpanData(){
		$data = array(
			'IDJenis' => $this->input->post('idjenis'),
			'JenisBuku' => $this->input->post('jenisbuku'));
		$this->db->insert('jenis',$data);
	}

	function hapusData($id){
		$this->db->where('IDJenis', $id);
		$this->db->delete('jenis');
	}

	function updateData(){
		$data = array(
			'IDJenis' => $this->input->post('idjenis'),
			'JenisBuku' => $this->input->post('jenisbuku'));
		$this->db->where('IDJenis',$this->input->post('idjenislama'));
		$this->db->update('jenis',$data);
	}

	function dataPerBuku($id){
		$this->db->where('IDJenis',$id);
		return $this->db->get('jenis');
	}
}
?>