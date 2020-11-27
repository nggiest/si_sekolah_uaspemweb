<?php  
Class Model_peminjaman extends CI_Model{
	
	function tampilData(){
		return $this->db->get('peminjaman');
	}

	function tampilDataPaging($offset,$perpage){
		$this->db->limit($perpage,$offset);
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('member','member.IDMember = peminjaman.IDMember');
		$this->db->join('buku','buku.IDBuku = peminjaman.IDBuku');
		$this->db->order_by('IDpeminjaman','ASC');
		$data = $this->db->get();
		return $data->result();
	}

	function simpanData(){
		$data = array(
			'IDBuku' => $this->input->post('idbuku'),
			'IDMember' => $this->input->post('idmember'),
			'TanggalPinjam' => $this->input->post('tglpinjam'),
			'TanggalHarusKembali' => $this->input->post('tglhrskembali'),
			'IDPetugas' => $_SESSION['id']);
		$this->db->insert('peminjaman',$data);
	}

	function hapusData($id){
		$this->db->where('IDpeminjaman', $id);
		$this->db->delete('peminjaman');
	}

	function updateData(){
		$tglkembali = date('Y-m-d');
		$tglhrskembali = $this->input->post('tglhrskembali');

		$explode1 = explode("-", $tglkembali);
		$explode2 = explode("-", $tglhrskembali);

		$daykembali = $explode1[2];
		$monthkembali = $explode1[1];
		$yearkembali = $explode1[0];

		$dayhrskembali = $explode2[2];
		$monthhrskembali = $explode2[1];
		$yearhrskembali = $explode2[0];

		
		$date1 = GregorianToJD($monthkembali, $daykembali, $yearkembali);
		$date2 = GregorianToJD($monthhrskembali, $dayhrskembali, $yearhrskembali);
		

		$selisih = $date1-$date2;
		if ($selisih > 0) {
			$denda = $selisih * 2500;
		} else {
			$denda = 0;
		}

		$data = array(
			'TanggalKembali' => $tglkembali,
			'Denda' => $denda);
		$array = array('IDBuku' => $this->input->post('idbuku'), 'IDMember' => $this->input->post('idmember'));
		$this->db->where($array);
		$this->db->update('peminjaman',$data);
	}

	function dataPerPinjam($id){
		$this->db->where('IDPeminjaman',$id);
		return $this->db->get('peminjaman');
	}

	function cariData($idbuku, $idmember){
		$array = array('peminjaman.IDBuku' => $idbuku, 'peminjaman.IDMember' => $idmember, 'peminjaman.TanggalKembali' => null);
		$this->db->where($array);
		$this->db->join('member','member.IDMember = peminjaman.IDMember');
		$this->db->join('buku','buku.IDBuku = peminjaman.IDBuku');
		return $this->db->get('peminjaman');
	}

	function searchData($pilihan,$key){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->like($pilihan, $key);
		$this->db->order_by('IDPeminjaman', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function belumKembali(){
		$this->db->where('TanggalKembali', null);
		return $this->db->get('peminjaman');
	}
}
?>