 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<form id="form_edit" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
	<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Data Desa
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nama Kepala Desa</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="kepala_desa" class="form-control" placeholder="Nama Kepala Desa . ." id="kepala_desa" value="<?php echo $kepala_desa; ?>">
				</div>
				<div class="form-group">
					<label>Jabatan Kepala Desa</label>
					<input type="text" name="jabatan_kades" placeholder="Jabatan Kepala Desa" class="form-control" id="jabatan_kades" value="<?php echo $jabatan_kades; ?>">
				</div>
				<div class="form-group">
					<label>Format Surat Keterangan</label>
					<input type="text" name="format_ket" placeholder="Format Surat Keterangan" class="form-control" id="format_ket" value="<?php echo $format_ket; ?>">
				</div>
				<div class="form-group">
					<label>Format Surat Registrasi</label>
					<input type="text" name="format_reg" placeholder="Format Surat Registrasi" class="form-control" id="format_reg" value="<?php echo $format_reg; ?>">
				</div>
				<div class="form-group">
					<label>Format Surat Berita Acara</label>
					<input type="text" name="format_berita" placeholder="Format Surat Berita Acara" class="form-control" id="format_berita" value="<?php echo $format_berita; ?>">
				</div>
			</div>
		</div>
		<!--  -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Data Admin Desa
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Admin . ." id="nama" value="<?php echo $nama; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pass1" placeholder="Password" class="form-control" id="pass1" >
				</div>
				<div class="form-group">
					<label>Ulangi Password</label>
					<input type="password" name="pass2" placeholder="Ulangi Password" class="form-control" id="pass2">
				</div>


			</div>

		</div>
		
		<div class="form-group">
					<div class="col-md-6">
					<button style="border-radius: 9px;" id="tombolsubmitupdate" class="btn btn-block btn-primary btn-lg">Simpan</button>
					</div>
					<div class="col-md-6">
              		<a href="<?php echo site_url('desa'); ?>" class="btn btn-danger btn-lg btn-block" style="border-radius: 9px;" > Batal</a>
              		</div>
				</div>
		
	</div>
	</div>
</form>





<?php 
$this->load->view($this->controller.'_form_view_js');
?>