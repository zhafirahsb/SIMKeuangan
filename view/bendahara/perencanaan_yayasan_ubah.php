<?php 
session_start();
require('../../url.php'); 
require('../../proses/yayasan.php'); 
require('../_template/head.php'); 
require('../_template/header.php');
require('../_template/sidebar.php');
$biaya = ['Biaya Gaji / Honor','Biaya Bantuan'];
$gaji = ['Honor Guru Tetap','Honor Guru Tidak Tetap','Honor Guru DPK','Tunjangan','Honor Pegawai'];
$bantuan = ['Bantuan Sosial Siswa','Bantuan Hadiah','BPJS Kesehatan Kasek','BPJS Kesehatan Guru','BPJS Ketenagakerjaan','Seragam','THR'];
$id = $_GET['id'];
$detail_uraian = get_uraian_rencana(['id_yayasan_detail_rencana_pengeluaran'=>$id]);
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Perencanaan BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="card">
      <div class="card-block">
        <h4>Ubah Rencana Pengeluaran Dana Yayasan</h4>
        <form action="" method="POST">
          
          <table class="table table-bordered">
            <thead>
              <tr class="text-center">
                <td>Detail Uraian</td>
                <td colspan="2" width="20%">Satuan</td>
                <td colspan="2" width="20%">Volume</td>
                <td>Jumlah</td>
                <td>Total</td>
              </tr>
            </thead>
            <tbody id="datanya">
              <tr>
                <td><input type="text" name="detail_uraian" class="form-control" id="" value="<?=$detail_uraian[0]['uraian']?>"></td>
                <td><input type="number" name="jumlah_satuan" class="form-control" id="" value="<?=$detail_uraian[0]['nilai_satuan']?>"></td>
                <td><input type="text" name="satuan" class="form-control" id="" value="<?=$detail_uraian[0]['satuan']?>"></td>
                <td><input type="number" name="jumlah_volume" class="form-control" id="" value="<?=$detail_uraian[0]['nilai_volume']?>"></td>
                <td><input type="text" name="volume" class="form-control" id="" value="<?=$detail_uraian[0]['volume']?>"></td>
                <td><input type="number" name="jumlah" class="form-control" id="" value="<?=$detail_uraian[0]['jumlah']?>"></td>
                <td><input type="number" name="total" class="form-control" id="" value="<?=$detail_uraian[0]['total']?>"></td>
              </tr>
            </tbody>
          </table>
          <input type="submit" name="submit" value="Submit" class="btn btn-success">
          <a href="<?= $url; ?>view/bendahara/perencanaan_yayasan.php" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>
