<?php 
session_start();
require('../../url.php'); 
require('../../proses/bos.php'); 
require('../_template/head.php'); 
require('../_template/header.php');
require('../_template/sidebar.php');


?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Realisasi</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= $url; ?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">BOS</li>
          <li class="breadcrumb-item active">Realisasi Dana BOS</li>
          <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
      </div>
    </div>
    <?php $pendapatan = get_realisasi_pendapatan($_GET['id']);?>
    <div class="card">
      <div class="card-block">
        <h4><u>Form Ubah Realisasi Pendapatan BOS</u></h4>
        <form action="" method="post">
          <input type="hidden" name="realisasi" value="<?= $pendapatan[0]['id_bos_realisasi_pendapatan']; ?>">
          <div class="row">
            <div class="col-2">
              <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="<?= $pendapatan[0]['tahun']; ?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Jumlah Dana</label>
                <input type="number" name="jumlah_dana" class="form-control" value="<?= $pendapatan[0]['nominal']; ?>">
              </div>
            </div>
            <div class="col-1 align-self-center">
              <input type="submit" value="Simpan" name="submit" class="btn btn-primary" onclick="<?php ubah_realisasi_pendapatan_bos();?>">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>
