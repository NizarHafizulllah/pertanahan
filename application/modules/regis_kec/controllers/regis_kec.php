
<?php 
class regis_kec extends kecamatan_controller{
	var $controller;
	function regis_kec(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('regis_kec_model','dm');
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
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Registrasi Pertanahan");
        $this->set_title("Kecamatan");
        $this->set_content($content);
        $this->cetak();
}





function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pemilik','Nama Pengguna','required');   
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        
        

        $post['tgl_lhr_pemilik'] = flipdate($post['tgl_lhr_pemilik']);
        $post['tgl_pernyataan'] = flipdate($post['tgl_pernyataan']);
        $post['tgl_register_desa'] = flipdate($post['tgl_register_desa']);
        $userdata = $this->session->userdata('desa_login');
        $post['desa_tanah'] = $userdata['desa'];
        $post['kec_tanah'] = $userdata['kecamatan'];
        

        $post['status'] = '1';
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('tanah', $post); 
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


function get_desa(){
    $data = $this->input->post();

    $id_kecamatan = $data['id_kecamatan'];
    $this->db->where("id_kecamatan",$id_kecamatan);
    $this->db->order_by("desa");
    $rs = $this->db->get("tiger_desa");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->desa </option>";
    endforeach;


}


    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $nama_pemilik = $_REQUEST['columns'][1]['search']['value'];

        $userdata = $this->session->userdata('kec_login');
        $desa = $userdata['kecamatan'];
        

        // $this->db->where('desa_tanah', $desa);
        


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama_pemilik" => $nama_pemilik,
                "desa" => $desa
				
				 
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
        $id = $row['id'];
        
        

        if ($row['status'] == 1) {
            

            
            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-danger'>Pending</button>
                              <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"approved('$id')\" ><i class='fa fa-trash'></i> Menyetujui</a></li>
                                <li><a href='regis_kec/detail?id=$id'><i class='fa fa-edit'></i> Detail</a></li>
                              </ul>
                            </div>";
            
        }else {

            
            $action = '<div class="btn-group">
                              <button type="button" class="btn btn-success">Selsai</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                              </ul>
                            </div>';
        }
        	
        $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
        	 
        	$arr_data[] = array(
                $row['tgl_register_desa'],
                $row['no_register_desa'],
        		$row['nama_pemilik'],     		 
        		$action,
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    

    function detail(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $biro_jasa = $this->db->get('tanah');
    	 $data = $biro_jasa->row_array();

         $data['tgl_lhr_pemilik'] = flipdate($data['tgl_lhr_pemilik']);
         $data['tgl_pernyataan'] = flipdate($data['tgl_pernyataan']);
         $data['tgl_register_desa'] = flipdate($data['tgl_register_desa']);

        $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       


        $data['action'] = 'update';
         
		$content = $this->load->view("regis_kec_view_form_detail",$data,true);

       

		$this->set_subtitle("");
		$this->set_title("Detail Registrasi Pertanahan");
		$this->set_content($content);
		$this->cetak();

    }





 function get_kecamatan(){
    $data = $this->input->post();

    $id_kota = $data['id_kota'];
    $this->db->where("id_kota",$id_kota);
    $this->db->order_by("kecamatan");
    $rs = $this->db->get("tiger_kecamatan");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kecamatan </option>";
    endforeach;


}

function cek_no_reg($no_register_kec){
    $this->db->where("no_register_kec",$no_register_kec);

    if(empty($no_register_kec)){
         $this->form_validation->set_message('cek_no_reg', ' No Registrasi Harus Di Isi');
         return false;
    }
    if($this->db->get("tanah")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_no_reg', ' Sudah Ada Data Dengan No Registrasi Ini');
         return false;
    }
}



function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('tgl_register_kec','Tanggal Registrasi','required'); 
        $this->form_validation->set_rules('no_register_kec','Registrasi','callback_cek_no_reg');   
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $userdata = $this->session->userdata('kec_login');
        $post['camat'] = $userdata['nama_camat'];
        $post['jabatan_camat'] = $userdata['jabatan_camat'];
        $post['nip_camat'] = $userdata['nip_camat'];

        $post['tgl_register_kec'] = flipdate($post['tgl_register_kec']);
        $post['status'] = 2;


        $this->db->where("id",$post['id']);
        $res = $this->db->update('tanah', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"Register Kecamatan Berhasil");
        }
        else {
             $arr = array("error"=>true,'message'=>"Register Kecamatan Gagal");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}




     function approved(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$userdata = $this->session->userdata();

    	

    	$this->db->where("id",$post['id']);
    	$res = $this->db->update('tanah', $post);
        if($res){
            $arr = array("error"=>false,"message"=>$this->db->last_query()." DATA BERASIL DI SETUJUI");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DISETUJUI ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }


}

?>