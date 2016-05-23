 	<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
 	<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>


<form id="form_data" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
<form role="form">
<div class="row">




<!-- KOLOM KIRI -->

			<div class="col-md-6">
              <!-- general form elements -->
              <!-- Kolom Kanan -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pernyataan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    
                    <div class="form-group">
                      <label>Yang Membuat Pernyataan</label>
                      <input type="text" name="pembuat_pernyataan" class="form-control" placeholder="Yang Membuat Pernyataan ...">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Tanggal Pernyataan</label>
                      <input type="text" id="tanggal" name="tgl_pernyataan" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pernyataan"  data-date-format="dd-mm-yyyy">
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pemilik</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="no_ktp_pemilik" class="form-control" placeholder="NIK (No. Induk Kependudukan)...">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Nama ..." name="nama_pemilik">
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Tempat Lahir ..." name="tmpt_lhr_pemilik">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" id="tgl_lahir" name="tgl_lhr_pemilik" class="tanggal ui-datepicker form-control" placeholder="Tanggal Lahir"  data-date-format="dd-mm-yyyy">
                    </div>

                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" placeholder="Pekerjaan ..." name="pekerjaan_pemilik">
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat_pemilik"></textarea>
                    </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->




              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Letak Tanah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label>Jalan</label>
                      <input type="text" class="form-control" placeholder="Jalan..." name="jln_tanah">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>RT</label>
                      <input type="text" class="form-control" placeholder="RT ..." name="rt_tanah">
                    </div>

                    <div class="form-group">
                      <label>RW</label>
                      <input type="text" class="form-control" placeholder="RW ..." name="rw_tanah">
                    </div>

                    <div class="form-group">
                      <label>Lingkungan</label>
                      <input type="text" class="form-control" placeholder="Lingkungan ..." name="dusun_tanah">
                    </div>



                    <input type="hidden" name="kab_tanah" value="19_5">

                    <div class="form-group">
                      <label>Kecamatan</label>
                      <?php echo form_dropdown("kec_tanah",$arr_kecamatan,'','id="id_kecamatan" class="form-control select2" style="width: 100%;"'); ?>
                    </div>

                    <div class="form-group">
                      <label>Desa/Kelurahan</label>
                      <?php echo form_dropdown("desa_tanah",array(),'','id="id_desa" class="form-control select2" style="width: 100%;"'); ?>
                    </div>

                    <div class="form-group">
                      <label>Status Tanah</label>
                      <input type="text" class="form-control" placeholder="Status Tanah ..." name="status_tanah">
                    </div>

                    <div class="form-group">
                      <label>Dipergunakan Untuk</label>
                      <input type="text" class="form-control" placeholder="Dipergunakan Untuk ..." name="guna_tanah">
                    </div>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->


              
            </div>








<!-- KOLOM KANAN -->


            <div class="col-md-6">
              <!-- general form elements -->
              <!-- Kolom Kiri -->







              



              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Tanah</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label>Sejak Kuasa</label>
                      <input type="text" class="form-control" placeholder="Sejak Kuasa..." name="sejak_kuasa_tanah">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Batas Utara</label>
                      <input type="text" class="form-control" placeholder="Batas Utara ..." name="batas_u">
                    </div>

                    <div class="form-group">
                      <label>Pemilik Tanah</label>
                      <input type="text" class="form-control" placeholder="Pemilik Tanah ..." name="nama_batas_u">
                    </div>

                    <div class="form-group">
                      <label>Batas Selatan</label>
                      <input type="text" class="form-control" placeholder="Batas Selatan ..." name="batas_s">
                    </div>

                    <div class="form-group">
                      <label>Pemilik Tanah</label>
                      <input type="text" class="form-control" placeholder="Pemilik Tanah ..." name="nama_batas_s">
                    </div>

                    <div class="form-group">
                      <label>Batas Timur</label>
                      <input type="text" class="form-control" placeholder="Batas Timur ..." name="batas_t">
                    </div>

                    <div class="form-group">
                      <label>Pemilik Tanah</label>
                      <input type="text" class="form-control" placeholder="Pemilik Tanah ..." name="nama_batas_t">
                    </div>

                    <div class="form-group">
                      <label>Batas Barat</label>
                      <input type="text" class="form-control" placeholder="Batas Barat ..." name="batas_b">
                    </div>

                    <div class="form-group">
                      <label>Pemilik Tanah</label>
                      <input type="text" class="form-control" placeholder="Pemilik Tanah ..." name="nama_batas_b">
                    </div>

                    <div class="form-group">
                      <label>Yang Terdapat Di Perkarangan</label>
                      <textarea class="form-control" rows="3" placeholder="Yang Terdapat Di Perkarangan ..." name="tanaman"></textarea>
                    </div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <button style="border-radius: 9px;" id="tombolsubmitsimpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
              
              <button style="border-radius: 9px;" class="btn btn-block btn-danger btn-lg">Batal</button>


            </div><!--/.col (right) -->

            

        </div>
        </form>

<?php 
$this->load->view('regis_kecamatan_form_view_js');
?>
