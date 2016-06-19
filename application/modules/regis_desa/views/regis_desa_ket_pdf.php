<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css"></head>

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
    <td width="23%" align="center"><img src="<?php echo base_url()."assets/images/bangka_barat.png" ?>" width="50" height="60" align="right" /></td>
    <td width="54%" align="center"><p><span class="judul">PEMERINTAH KABUPATEN <?php echo $kab_tanah ;?><br />
      KECAMATAN <?php echo $kec_tanah ;?><br />
      KANTOR PEMERINTAH DESA <?php echo $desa_tanah ;?></span></p>
      <p> 
    </p></td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>

</table>
<table width="100%">
  <tr>
    <td height="39">&nbsp;</td>
    <td align="center"><u><strong>SURAT KETERANGAN</strong></u><strong><br />
    NO : <?php echo $no_ket_desa ?></strong> </td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100%">
<tr>
  <td width="98%" height="24"><p>Yang bertanda tangan di bawah ini :</p></td>
</tr>
</table>
<br/>    
    <table width="100%">
	<tr>
        <td width="2%" >&nbsp;</td>
      <td width="18%" >Kepala Desa</td>
      <td width="80%">: <?php echo $desa_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kecamatan</td>
        <td>: <?php echo $kec_tanah; ?> </td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >Kabupaten</td>
        <td>: <?php echo $kab_tanah ?></td>
      </tr>
    </table>

<br/>
<br/>  


<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="98%"><p>Dengan ini menerangkan sebagaimana berikut : </p>
    </td>
  </tr>
</table>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">1.</td>
    <td width="91%" align="justify"><p>Bahwa berdasarkan Surat Pernyataan Penguasaan Fisik Bidang Tanah tanggal <?php echo flipdate($tgl_pernyataan); ?>, diketahui Kepala Desa <?php echo $desa_tanah.' tanggal '.flipdate($tgl_register_desa).' No. '.$no_register_desa; ?> berupa tanah <?php echo $guna_tanah; ?> yang terletak di <?php echo $dusun_tanah ?> Desa 
        <?php $desa_tanah?> 
        Kecamatan <?php echo $kec_tanah; ?> Kabupaten <?php echo $kab_tanah; ?> dengan luas ± 
        <?php $luas = ($batas_u*$batas_b); echo $luas;?>
    M² ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; meter persegi) dengan batas - batas sebagai berikut : </p> </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Sebelah Utara</td>
    <td width="67%">: ± <?php echo $batas_u.' Meter berbatasan dengan tanah '.$nama_batas_u; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: ± <?php echo $batas_s.' Meter berbatasan dengan tanah '.$nama_batas_s; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: ± <?php echo $batas_t.' Meter berbatasan dengan tanah '.$nama_batas_t; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Sebelah Barat</td>
    <td width="67%">: ± <?php echo $batas_b.' Meter berbatasan dengan tanah '.$nama_batas_b; ?> </td>
  </tr>
</table>
<br/>
<br/> 
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="91%"><p>Adalah benar tanah yang dikuasai / dipunyai</p>
    </td>
  </tr>
</table>

<br/>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Nama</td>
    <td width="67%">: <?php echo $nama_pemilik ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Tempat Tanggal Lahir</td>
    <td>: <?php echo $tmpt_lhr_pemilik.', '.$tgl_lhr_pemilik ;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>: <?php echo $pekerjaan_pemilik; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>No. KTP</td>
    <td>: <?php echo $no_ktp_pemilik; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Alamat/Tempat Tinggal</td>
    <td width="67%">: <?php echo $alamat_pemilik ?></td>
  </tr>
</table>


  


<br>
<br>
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">2. </td>
    <td width="91%" align="justify"><p>Bahwa tanah <?php echo $guna_tanah; ?> tersebut diusahakan/dikuasai secara fisik oleh yang bersangkutan sejak tahun <?php echo $sejak_kuasa_tanah; ?>, serta diatas tanah tersebut terdapat <?php echo $tanaman; ?>. </p>    </td>
  </tr>
</table>
<br/>
<br/> 
<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%" align="left" valign="top">3. </td>
    <td width="91%" align="justify"><p>Bahwa tanah tersebut belum pernah dipindah tangankan dengan pihak lai, tidak dalam sengketa, tidak dalam perkara, tidak diborongkan/jaminan hutang pada pihak lain dan bukan merupakan tanah warisan / milik bersama yang belum dibagikan. </p>    </td>
  </tr>
</table>
<br/>
<br/>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="98%"><p>Demikian Surat Keterangan Tanah ini dibuat dengan sebenar - benarnya untuk dapat dipergunakan sebagaimana mestinya. </p></td>
  </tr>
</table>
<br/>
<br/>
<table width="100%">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="12%">Nomor</td>
    <td width="21%">: <?php echo $no_ket_kec; ?></td>
    <td width="16%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td>: <?php echo flipdate($tgl_register_kec); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Mengetahui </td>
    <td>: </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" >&nbsp;</td>
    <td ></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td colspan="2" ><div align="center"><b>CAMAT <?php echo $kec_tanah; ?> </b> </div></td>
    <td width="16%" ></td>
    <td colspan="2"><div align="center"><?php echo $desa_tanah.', '.flipdate($tgl_register_desa); ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"><b>KEPALA DESA <?php echo $desa_tanah; ?> </b></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td colspan="2" ><div align="center"><b><?php echo $camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%" height="21">&nbsp;</td>
    <td colspan="2"><div align="center"><b><?php echo $jabatan_camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%" height="21">&nbsp;</td>
    <td colspan="2"><div align="center"><b>NIP. <?php echo $nip_camat; ?></b></div></td>
    <td width="16%">&nbsp;</td>
    <td td colspan="2"><div align="center"><b><?php echo $kades; ?></b></div></td>
  </tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table width="100%" border="0">
  <tr>
    <td colspan="6"><div align="center"><strong>&quot;Denah / Peta&quot;</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="19%" >&nbsp;</td>
    <td width="15%" >&nbsp;</td>
    <td width="6%" >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="43%"><div align="center"><?php echo $batas_u; ?> m</div></td>
    <td width="16%">&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td rowspan="3" valign="middle"><img src="<?php echo base_url()."assets/images/arah.jpg" ?>" alt="" width="186" height="147" align="center" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="3"> <img src="<?php echo base_url()."assets/images/kotak.png" ?>" alt="" width="<?php $map_u = ($batas_u/$batas_u)*448;  echo $map_u; ?>" height="<?php $map_b = ($batas_b/$batas_u)*448; 
    if($map_b < 250){
      echo 250;
    }else if($map_b > 600){
      echo 600;
    }else{
      echo $map_b;
    }
    ?>" align="center" /></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $batas_b; ?> m</td>
    <td align="left" valign="middle"> <?php echo $batas_t; ?> m</td>
  </tr>
  <tr>
    <td height="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $batas_s; ?> m</div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="24%">Sebelah Utara</td>
    <td width="67%">: ± <?php echo $batas_u.' Meter berbatasan dengan tanah '.$nama_batas_u; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Selatan</td>
    <td>: ± <?php echo $batas_s.' Meter berbatasan dengan tanah '.$nama_batas_s; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sebelah Timur</td>
    <td>: ± <?php echo $batas_t.' Meter berbatasan dengan tanah '.$nama_batas_t; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="24%">Sebelah Barat</td>
    <td width="67%">: ± <?php echo $batas_b.' Meter berbatasan dengan tanah '.$nama_batas_b; ?> </td>
  </tr>
</table>
<br/>
<br/>
<br/>


<table width="100%" border="0">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="21%">Di Ukur Oleh :</td>
    <td width="16%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="34%">Pemilik Tanah</td>
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
    <td>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
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
    <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
    <td>&nbsp;</td>
    <td><?php echo $nama_pemilik ?> </td>
  </tr>
</table>

<!-- </div> end of wrap -->
</body>

</html>