<?php 
class regis_desa extends desa_controller{
	var $controller;
	function regis_desa(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('regis_desa_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}








function index(){
		$data_array=array();
        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Registrasi Desa");
        $this->set_title("Registrasi Desa");
        $this->set_content($content);
        $this->cetak();
}


function baru(){
        $data_array=array();

        // $userdata = $this->session->userdata('admin_login');
        // $username1 = $userdata['username'];

        $userdata = $this->session->userdata('desa_login');

        $this->db->where('desa_tanah', $userdata['desa']);
        $data = $this->db->get('tanah');
        $data_array['no_data'] = $data->num_rows()+1;

        


        $data_array['action'] = 'simpan';
        $content = $this->load->view($this->controller."_form_view",$data_array,true);


        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", "id_kota", "19_5");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Desa");
        $this->set_title("Register Pertanahan");
        $this->set_content($content);
        $this->cetak();
}


function cek_email($no_hp){
    $this->db->where("no_hp",$no_hp);
    if($this->db->get("super_admin")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_email', ' %s Sudah ada');
         return false;
    }

}

function cek_passwd($p1){
    $p2 = $this->input->post('p2');

    if(empty($p1) or empty($p2)){
         $this->form_validation->set_message('cek_passwd', ' %s harus diisi');
         return false;
    }
    if($p1 <> $p2) {
        $this->form_validation->set_message('cek_passwd', ' %s tidak sama');
         return false;
    }
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
        $post['no_register_desa'] = $post['no_data_desa'].''.$userdata['format_reg'];
        $post['no_ket_desa'] = $post['no_data_desa'].''.$userdata['format_ket'];
        $post['no_berita_acara_desa'] = $post['no_data_desa'].''.$userdata['format_berita'];
        $post['nama_batas_u'] = $post['saksi_satu_nama'];
        $post['nama_batas_b'] = $post['saksi_dua_nama'];
        $post['nama_batas_t'] = $post['saksi_tiga_nama'];
        $post['nama_batas_s'] = $post['saksi_empat_nama'];

        $post['status'] = '1';
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $userdata = $this->session->userdata('desa_login');
        $post['kades'] = $userdata['kepala_desa']; 

        
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

        $userdata = $this->session->userdata('desa_login');
        $desa = $userdata['desa'];

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
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='regis_desa/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";
            
        }else {

            
            $action = '<div class="btn-group">
                              <button type="button" class="btn btn-success">Cetak</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#"  onclick=\'printper('.$id.')\'><i class="fa fa-print"></i> Surat Pernyataan</a></li>
                                <li><a href="#"  onclick=\'printket('.$id.')\'><i class="fa fa-print"></i> Surat Keterangan</a></li>
                                <li><a href="#"  onclick=\'printber('.$id.')\'><i class="fa fa-print"></i> Berita Acara</a></li>
                              </ul>
                            </div>';
        }
        	
        $row['tgl_register_desa'] = flipdate($row['tgl_register_desa']);
        	 
        	$arr_data[] = array(
                $row['tgl_register_desa'],
                $row['no_data_desa'],
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



    

    function editdata(){
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
         
		$content = $this->load->view("regis_desa_form_view_edit",$data,true);

       

		$this->set_subtitle("Edit Registrasi Desa");
		$this->set_title("Edit Registrasi Desa");
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



function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required'); 
                 
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $post['tgl_lhr_pemilik'] = flipdate($post['tgl_lhr_pemilik']);
        $post['tgl_pernyataan'] = flipdate($post['tgl_pernyataan']);
        $post['tgl_register_desa'] = flipdate($post['tgl_register_desa']);
        $userdata = $this->session->userdata('desa_login');
        $post['desa_tanah'] = $userdata['desa'];
        $post['kec_tanah'] = $userdata['kecamatan'];
        $post['no_register_desa'] = $post['no_data_desa'].''.$userdata['format_reg'];
        $post['no_ket_desa'] = $post['no_data_desa'].''.$userdata['format_ket'];
        $post['no_berita_acara_desa'] = $post['no_data_desa'].''.$userdata['format_berita'];
        $post['nama_batas_u'] = $post['saksi_satu_nama'];
        $post['nama_batas_b'] = $post['saksi_dua_nama'];
        $post['nama_batas_t'] = $post['saksi_tiga_nama'];
        $post['nama_batas_s'] = $post['saksi_empat_nama'];

        $post['status'] = '1';

        $this->db->where("id",$post['id']);
        $res = $this->db->update('tanah', $post); 
        if($res){
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



    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('tanah', $data);
        if($res){
            $arr = array("error"=>false,"message"=>$this->db->last_query()." DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }




  function pdfper() {

    $get = $this->input->get(); 
    $id = $get['id'];

    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];


    $data['controller'] = get_class($this);
    $data['header'] = "data";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


 function pdfket() {

    $get = $this->input->get(); 
    $id = $get['id'];

    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];


    $data['controller'] = get_class($this);
    $data['header'] = "Surat Keterangan";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_ket_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}



 function pdfberita(){

    $get = $this->input->get(); 
    $id = $get['id'];
    
    $this->db->where('id', $id);
    $rs = $this->db->get('tanah');
    $data = $rs->row_array();
    extract($data);

    $this->db->where('id', $desa_tanah);
    $qr = $this->db->get('tiger_desa');
    $rs = $qr->row_array();
    $data['desa_tanah'] = $rs['desa'];

    $this->db->where('id', $kec_tanah);
    $qr = $this->db->get('tiger_kecamatan');
    $rs = $qr->row_array();
    $data['kec_tanah'] = $rs['kecamatan'];

    $this->db->where('id', $kab_tanah);
    $qr = $this->db->get('tiger_kota');
    $rs = $qr->row_array();
    $data['kab_tanah'] = $rs['kota'];


    $data['controller'] = get_class($this);
    $data['header'] = "Berita Acara";
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
     
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("regis_desa_berita_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}



}

?>