<?php 
class admin_add_kecamatan extends admin_controller{
	var $controller;
	function admin_add_kecamatan(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('admin_add_kecamatan_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


    function cekEmail(){
        $no_hp = $this->input->post('no_hp');
        $valid = true;
        $this->db->where('no_hp', $no_hp);
        $jumlah = $this->db->get("super_admin")->num_rows();    
        if($jumlah == 1) {
            $valid = false;
        }
        
        echo json_encode(array('valid' => $valid));
    
    }






function index(){
		$data_array=array();
		$content = $this->load->view("admin_add_kecamatan_view",$data_array,true);

		$this->set_subtitle("Data Admin Kecamatan");
		$this->set_title("Data Admin Kecamatan");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';

        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Kecamatan");
        $this->set_title("Tambah Kecamatan");
        $this->set_content($content);
        $this->cetak();
}


function cek_username($username){
    $this->db->where("username",$username);

    if(empty($username)){
         $this->form_validation->set_message('cek_username', ' Username harus diisi');
         return false;
    }
    if($this->db->get("admin_kecamatan")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_username', ' Username Ini Sudah Terpakai');
         return false;
    }

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

function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        // $this->form_validation->set_rules('nama_camat','Nama Camat','required');
        // $this->form_validation->set_rules('nip_camat','NIP Camat','required');
        // $this->form_validation->set_rules('jabatan_camat','Jabatan Camat','required');
        // $this->form_validation->set_rules('nama','Nama Admin','required');  
        $this->form_validation->set_rules('username','Username','callback_cek_username');
        $this->form_validation->set_rules('pass1','Cek Password','callback_cek_passwd');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus di Isi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $post['password'] = md5($post['pass1']);
        unset($post['pass1']);
        unset($post['pass2']);

        
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('admin_kecamatan', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}




    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $pengguna = $_REQUEST['columns'][1]['search']['value'];


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"pengguna" => $pengguna
				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $id = $row['id'];
        $hapus = "<a href ='#' onclick=\"hapus('$id')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
        <a href ='$this->controller/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        	
        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['pengguna'],
        		$row['kecamatan'],      		 
        		$hapus
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

 




 






    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('admin_kecamatan', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }


}

?>