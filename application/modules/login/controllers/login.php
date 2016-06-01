<?php 
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("tanggal");
		$this->load->helper("url");
		$this->load->helper("kirimemail");
		//$this->load->helper("serviceurl");
		
	}
	
	function index(){
		$msg = '';

		$psn_login = array('msg' => $msg );
		$this->load->view("login_view", $psn_login);
	}
	
	
	function logout_admin(){
		$this->session->unset_userdata("admin_login",true);
		redirect("login");
	}
	function logout_kecamatan(){
		$this->session->unset_userdata("kec_login",true);
		redirect("login");
	}
	function logout_desa(){
		$this->session->unset_userdata("desa_login",true);
		redirect("login");
	}
	

	
function cekusername($username) {
	$this->db->where("username",$username);
	$jumlah = $this->db->get("admin")->num_rows();
	if($jumlah > 0) {
		$this->form_validation->set_message('cek_username', "Username $username sudah terdaftar  ");
		return false;
	}
}
	




function cek_password($password) {
	 $password2 = $_POST['password2'];

	 if($password == "" or $password2=="") {
	 	$this->form_validation->set_message('cek_password', 'Password harus diisi dengan benar ');
		return false;
	 }

	 if($password <> $password2 ) {
	 	$this->form_validation->set_message('cek_password', 'Password Harus sama');
		return false;
	 }


}









	function ceklogin(){

		 $data = $this->input->post();
		 $username = $data['form-username'];
		 $password = md5($data['form-password']);

		 

		 
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);
		 $res = $this->db->get('admin');

		 if($res->num_rows()==1) {

		 	$member = $res->row_array();
		 	// show_array($member);
		 	// exit;

		 	$member['login'] = true;
		 	$this->session->set_userdata('admin_login', $member);
		 	$datalogin = $this->session->userdata("admin_login");
		 	redirect('admin');		
		 	// $ret = array("error"=>true,"message"=>"Kombinasi Email Dan Password Tidak Dikenali");



		 }
		 else {


		 	$this->db->where("username", $username);
		 	$this->db->where("password", $password);
		 	$res = $this->db->get("admin_kecamatan");

		 	if($res->num_rows()==1){
		 		$member = $res->row_array();

		 		$member["login"] = true;
		 		$this->session->set_userdata('kec_login', $member);
		 		$datalogin = $this->session->userdata('kec_login');

		 		redirect('kecamatan');
		 	}else{

		 		$this->db->where("username", $username);
		 		$this->db->where("password", $password);
		 		$res = $this->db->get("admin_desa");

		 		if ($res->num_rows()==1) {
		 			$member = $res->row_array();

		 			$member["login"] = true;

		 			$this->session->set_userdata("desa_login", $member);
		 			$datalogin = $this->session->userdata("desa_login");

		 			redirect("desa");
		 		}else{

		 			$msg = '<div class="alert bg-danger" role="alert">
						<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Kombinasi Username Dan Password Salah <a href="#" class="pull-right"><span id="hide" class="glyphicon glyphicon-remove"></span></a>
						</div>';


					$psn_login = array('msg' => $msg );
					$this->load->view("login_view", $psn_login);
		 		}

		 	
		 	}
		 	
		}	 
	}





	
		function cekEmail(){
		$email = $this->input->post('email');
		$valid = true;
		$query = $this->db->where('email', $email);
		$jumlah = $this->db->get("members")->num_rows();	
		if($jumlah > 0) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	
	}

	
	


}

?>