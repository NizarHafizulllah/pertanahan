<?php 
class profil_desa extends desa_controller{
	
    var $controller;
	function profil_desa(){
		parent::__construct();

		$this->controller = get_class($this);
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


   


function index(){

        $userdata = $this->session->userdata('desa_login');
        $id = $userdata['id'];

        

         $this->db->where('id',$id);
         $rs = $this->db->get('admin_desa');
         $data_array = $rs->row_array();

         $kecamatan = $data_array['kecamatan'];

         $data_array['action'] = 'update';
         $data_array['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);

		
		$content = $this->load->view("profil_desa_form_view",$data_array,true);

		$this->set_subtitle("Profil");
		$this->set_title("Profil");
		$this->set_content($content);
		$this->cetak();
}



function cek_passwd($pass1){
    $pass2 = $this->input->post('pass2');

    if(empty($pass1) or empty($pass2)){
         $this->form_validation->set_message('cek_passwd', ' Password harus diisi');
         return false;
    }
    if($pass1 <> $pass2) {
        $this->form_validation->set_message('cek_passwd', ' Password tidak sama');
         return false;
    }
}


 
function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        


        if (!empty($post['pass1'])) {
                      $this->form_validation->set_rules('pass1','Cek Password','callback_cek_passwd');
                      $post['password'] = md5($post['pass1']);

                  }else{
                    unset($post['pass1']);
                    unset($post['pass2']);
                  }           
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        unset($post['pass1']);
        unset($post['pass2']);

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        


        $this->db->where("id",$post['id']);
        $res = $this->db->update('admin_desa', $post);

        
        if($res){
            $this->db->where('id', $post['id']);
            $qr = $this->db->get('admin_desa');
            $member = $qr->row_array();
            $member['login'] = true;
            $this->session->set_userdata("desa_login", $member);
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}








}

?>