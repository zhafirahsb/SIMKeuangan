<?php
session_start();
require('../../url.php');
require('../../proses/bos.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
$pendapatan = $crud->read_data('bos_realisasi_pendapatan');
if (isset($_POST['data'])) {
  $pendapatan1 = $crud->read_data('bos_realisasi_pendapatan', ['tahun' => $_POST['tahun_ajaran']]);
  $standar = $crud->read_data('tbl_standar_nasional');
}
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Realisasi Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Realisasi BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="card">
      <div class="card-block">
        <h4><u>Pendapatan BOS</u></h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Jumlah Dana</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($pendapatan as $pe) {
            ?>
              <tr>
                <td><?= $pe['tahun']; ?></td>
                <td><?= number_format($pe['nominal'], 0, ',', '.'); ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <form action="" method="post">
              <div class="row mb-5">
                <div class="col-3 align-self-center">
                  <select name="tahun_ajaran" class="form-control" id="" required>
                    <option value="">Pilih Tahun Ajaran</option>
                    <?php
                    for ($a = 2017; $a <= date('Y'); $a++) {
                    ?>
                      <option value="<?= $a; ?>"><?= $a; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-1 align-self-center">
                  <input type="submit" value="Submit" name="data" class="btn btn-primary">
                </div>
              </div>
            </form>
            <?php
            $no = 0;
            $jumlah = 0;
            // foreach ($pendapatan as $re) {
            if (@count($pendapatan1) > 0) {
            ?>
              <p>Tahun Ajaran <?= $pendapatan1[0]['tahun']; ?></p>
              <table class="table table-bordered mt-3">
                <thead>
                  <th>No</th>
                  <th>Nama Program</th>
                  <th>Dana Digunakan</th>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($standar as $s) {
                    $dana = $crud->query("SELECT SUM(jumlah) jumlah FROM `bos_realisasi_rekapitulasi` JOIN bos_realisasi_detail_komponen ON bos_realisasi_detail_komponen.relasi_id = bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi WHERE bos_realisasi_rekapitulasi.idsnp = '" . $s['idsnp'] . "' AND tahun_ajaran = '" . $pendapatan1[0]['tahun'] . "'")
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $s['nama_program']; ?></td>
                      <td><?= number_format($dana[0]['jumlah'], 0, ',', '.'); ?></td>
                    </tr>
                  <?php
                    $no++;
                    $jumlah += $dana[0]['jumlah'];
                  }
                  ?>
                  <th colspan="2">Total Dana Digunakan</th>
                  <td><?= number_format($jumlah, 0, ',', '.'); ?></td>
                </tbody>
              </table>
            <?php
            } else {
            ?>
              <p>Tidak ada data</p>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>