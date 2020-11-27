<?php  
	function ceklogin(){
		$ci = & get_instance();
		if ($ci->session->LoginBang != 'oke') {
			redirect('controller_auth/login');
		}
	}
?>