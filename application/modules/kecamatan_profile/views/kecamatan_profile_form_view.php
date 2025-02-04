 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<form id="form_data" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
	<div class="row">
	<div class="col-md-12">
		<div class="box box-primary" >
			<div class="box-header with-border" >
				<h3 class="box-title">
					Data Kecamatan
				</h3>
			</div>
			<div class="box-body" >
				<div class="form-group" >
					<label >Nama Camat</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="nama_camat" class="form-control" placeholder="Nama Camat . ." id="nama_camat" value="<?php echo $nama_camat; ?>">
				</div>
				<div class="form-group">
					<label>NIP Camat</label>
					<input type="text" name="nip_camat" placeholder="NIP Camat" class="form-control" id="nip_camat" value="<?php echo $nip_camat; ?>">
				</div>
				<div class="form-group">
					<label>Jabatan Camat</label>
					<input type="text" name="jabatan_camat" placeholder="Jabatan Camat" class="form-control" id="jabatan_camat" value="<?php echo $jabatan_camat; ?>">
				</div>
				<div class="form-group">
					<label>Format Surat Registrasi</label>
					<input type="text" name="format_reg" placeholder="Format Surat Registrasi" class="form-control" id="format_reg" value="<?php echo $format_reg; ?>">
				</div>
				<div class="form-group">
					<label>Format Surat Keterangan</label>
					<input type="text" name="format_ket" placeholder="Format Surat Keterangan" class="form-control" id="format_ket" value="<?php echo $format_ket; ?>">
				</div>
			</div>
		</div>
		<!--  -->
		<div class="box box-primary">
			<div class="box-header with-border " >
				<h3 class="box-title">
					Data Admin Kecamatan
				</h3>
			</div>
			<div class="box-body" >
				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Admin . ." id="nama" value="<?php echo $nama; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass1" placeholder="Password" class="form-control" id="pass1">
				</div>
				<div class="form-group">
					<label>Ulangi Password</label>
					<input type="password" name="pass2" placeholder="Ulangi Password" class="form-control" id="pass2">
				</div>


			</div>

		</div>
		
		<div class="form-group">
					<div class="col-md-6">
					<button  id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
					</div>
					<div class="col-md-6">
              		<a href="<?php echo site_url('kecamatan'); ?>" class="btn btn-danger btn-lg btn-block"> Batal</a>
              		</div>
				</div>
		
	</div>
	</div>
</form>





<?php 
$this->load->view($this->controller.'_form_view_js');
?>