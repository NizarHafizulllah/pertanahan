
<?php 

class nasabah_transaksi_model extends CI_Model {


	function nasabah_transaksi_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 

		 $kolom = array(0=>"id",
		 					"tgl",
							"harga",
							"saldo_awal",
							"saldo_akhir",							 
		 	);


		
		
		
		 $this->db->where("id_nasabah", $nasabah);

		 

		 if(!empty($nama)) {
		 	$this->db->like("nama",$nama);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('transaksi');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>