<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
</head>

<body>

<!-- <div id="wrap" style="width:1024; margin:0px auto" >  -->


<style>
* {
  font-size:10px;
}
.judul {
  font-size:12px;
  font-weight:bold;
   text-align:center;
}

#gambar {
  width:50px;
  position:fixed;
  top:10px;
  float:left;
}

#kop {
  text-align:center;
}
</style>

<?php $userdata = $this->session->userdata('desa_login'); 
?>

<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png"; ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kab_tanah; ?><br />
      KECAMATAN <?php echo $kec_tanah; ?><br />
      KANTOR PEMERINTAH DESA <?php echo $desa_tanah; ?></span></p>
      </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>
</table>

<!-- <table width="100%">
  <tr>
    <td height="39"><div align="center"><strong>BERITA ACARA</strong><br/>
        <u><strong>PEMERIKSAAN FISIK BIDANG TANAH</strong></u><strong><br />
    NO :  <strong> </div></td>
  </tr>
</table> -->
<table width="100%" border="0">
  <tr>
    <td><div align="center"><strong>BERITA ACARA<br/>
          <u>PEMERIKSAAN FISIK BIDANG TANAH</u><br/>
    NO : <?php echo $no_berita_acara_desa; ?></strong></div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%">
<tr>
  <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal <?php echo flipdate($tgl_register_desa); ?> telah dilakukan pengukuran ulang sebidang tanah yang terletak di <?php echo $dusun_tanah.' Desa '.$desa_tanah.' Kecamatan '.$kec_tanah.' Kabupaten '.$kab_tanah; ?> dilakukan pemeriksaan atas fisik tanah berdasarkan permohonan dari : </p></td>
</tr>
</table>

<br/>
<br/> 

    <table width="100%">
	     <tr>
        <td width="3%" >&nbsp;</td>
      <td width="22%" >Nama</td>
      <td width="75%">: <?php echo $nama_pemilik; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Tempat Tanggal Lahir</td>
        <td>: <?php echo $tmpt_lhr_pemilik; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Pekerjaan</td>
        <td>: <?php echo $pekerjaan_pemilik; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >No. KTP</td>
        <td>: <?php echo $no_ktp_pemilik; ?></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Alamat/Tempat Tinggal</td>
        <td>: <?php echo $alamat_pemilik; ?></td>
      </tr>
    </table>

<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa setelah dilakukan pemeriksaan dan pengukuran yang di saksikan masing - masing sebelah menyebelah membenarkan tanah yang diakui oleh <strong><?php echo $nama_pemilik; ?></strong> tidak bermasalah (sengketa). Dengan batas - batas sebagai berikut.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="22%">Sebelah Utara</td>
    <td width="75%">: ± <?php echo $batas_u.' Meter berbatasan dengan tanah '.$nama_batas_u; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: ± <?php echo $batas_s.' Meter berbatasan dengan tanah '.$nama_batas_s; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: ± <?php echo $batas_t.' Meter berbatasan dengan tanah '.$nama_batas_t; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="22%">Sebelah Barat</td>
    <td width="75%">: ± <?php echo $batas_b.' Meter berbatasan dengan tanah '.$nama_batas_b; ?> </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dan ternyata apabila tidak benar serta ada gugatan dan tuntutan dari pihak lain atas tanah tersebut maka saya bersedia dituntut/dihukum oel yang berwajib.</p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="98%" height="24" align="justify"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian berita acara ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p></td>
  </tr>
</table>
<br/>
<br/>


<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="25%">Di Ukur Oleh :</td>
    <td width="14%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="42%">Pemilik Tanah</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $saksi_lima_jabatan ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $saksi_lima_nama ?></td>
    <td>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php echo $saksi_enam_jabatan ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $saksi_enam_nama ?></td>
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td><?php echo $nama_pemilik ?> </td>
  </tr>
</table>
<br/>
<br/>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="55%">Saksi Perbatasan</td>
    <td width="42%"><?php echo $desa_tanah.', '.$tgl_pernyataan ?></td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="2%">a. </td>
    <td width="23%"><?php echo $saksi_satu_nama; ?></td>
    <td width="30%">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td width="42%">Kepala Desa <?php echo $desa_tanah; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>b. </td>
    <td><?php echo $saksi_dua_nama; ?></td>
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>c. </td>
    <td><?php echo $saksi_tiga_nama; ?></td>
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>d. </td>
    <td><?php echo $saksi_empat_nama; ?></td>
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $kades; ?></td>
  </tr>
</table>
<!-- </div> end of wrap -->
</body>

</html>
