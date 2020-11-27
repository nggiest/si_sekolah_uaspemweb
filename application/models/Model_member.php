<?php  
Class Model_member extends CI_Model{
	
	function tampilData(){
		return $this->db->get('member');
	}

	function tampilDataPaging($offset,$perpage){
		$this->db->limit($perpage,$offset);
		$this->db->order_by('IDMember','ASC');
		$data = $this->db->get('member');
		return $data->result();
	}

	function simpanData(){
		$data = array(
			'IDMember' => $this->input->post('idmember'),
			'NamaMember' => $this->input->post('nama'),
			'Alamat' => $this->input->post('alamat'));
		$this->db->insert('member',$data);
	}

	function hapusData($id){
		$this->db->where('IDMember', $id);
		$this->db->delete('member');
	}

	function updateData(){
		$data = array(
			'IDMember' => $this->input->post('idmember'),
			'NamaMember' => $this->input->post('nama'),
			'Alamat' => $this->input->post('alamat'));
		$this->db->where('IDMember',$this->input->post('idmemberlama'));
		$this->db->update('member',$data);
	}

	function dataPerBuku($id){
		$this->db->where('IDMember',$id);
		return $this->db->get('member');
	}

	function searchByID($key,$id){
		$this->db->like($key,$id);
		return $this->db->get('member');
	}

	function searchData($pilihan,$key){
		$this->db->select('*');
		$this->db->from('member');
		$this->db->like($pilihan, $key);
		$this->db->order_by('IDMember', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
}
?>