<?php
session_start();
require('../../url.php');
require('../../proses/bos.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $tahun = $_POST['tahun_ajaran'];
  $rkas_rencana1 = $crud->read_data('bos_rkas_rencana', ['tahun' => $tahun]);
}
if (isset($_GET['tahun'])) {
  $tahun = $_GET['tahun'];
  $rkas_rencana1 = $crud->read_data('bos_rkas_rencana', ['tahun' => $tahun]);
}
$rkas_rencana = $crud->read_data('bos_rkas_rencana');
$pendapatan_belanja = $crud->pendapatan_belanja();
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Perencanaan Yayasan</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <p>Rencana Pemasukan</p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tahun Ajaran</th>
                  <th>Jumlah Siswa</th>
                  <th>Dana Persiswa</th>
                  <th>Total Dana</th>
                  <th>Saldo Tahun Lalu</th>
                  <th>Jumlah Penerimaan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($rkas_rencana as $rr) {
                ?>
                  <tr>
                    <td><?= $rr['tahun']; ?></td>
                    <td><?= $rr['jumlah_siswa']; ?></td>
                    <td><?= number_format($rr['dana_siswa'], 0, '.', '.'); ?></td>
                    <td><?= number_format($rr['total'], 0, ',', '.'); ?></td>
                    <td><?= number_format($rr['saldo_tahun_lalu'], 0, '.', '.'); ?></td>
                    <td><?= number_format($rr['total'] + $rr['saldo_tahun_lalu'], 0, ',', '.'); ?></td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
                <?php
                ?>
              </tbody>
            </table>
            <!-- <div class="row">
              <div class="col-2 mt-3">
                <p>Saldo Tahun Lalu</p>
              </div>
              <div class="col-3 align-self-center">
                <input type="number" class="form-control" name="" id="">
              </div>
              <div class="col-3 mt-3">
                <label for="">Total Rencana Pemasukan</label>
              </div>
              <div class="col-4 align-self-center">
                <input type="number" class="form-control" name="" id="">
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <!-- <a class="btn btn-default mb-5"></a> -->
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
                  <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                </div>
              </div>
            </form>
            <?php
            if (@count($rkas_rencana1) > 0) {
              // foreach ($rkas_rencana as $rr) {
            ?>
              <p>Rencana Pengeluaran / Belanja</p>
              <p>Tahun Ajaran <?= $rkas_rencana1[0]['tahun']; ?></p>
              <table class="table table-bordered mt-3" id="">
                <thead>
                  <th>Kode</th>
                  <th>Nama Program</th>
                  <th>Persentase</th>
                  <th>Jumlah</th>
                  <th>Rencana Dana Digunakan</th>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $standar = $crud->query("SELECT * FROM tbl_persentase_standar_nasional JOIN tbl_standar_nasional ON tbl_standar_nasional.idsnp = tbl_persentase_standar_nasional.npsn WHERE tahun_ajaran = '" . $rkas_rencana1[0]['tahun'] . "'");
                  $jumlah = 0;
                  $jumlah1 = 0;
                  $persentase = 0;
                  foreach ($standar as $st) {
                    $dana_rencana = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $rkas_rencana1[0]['tahun'] . "'");
                    $dana = ($st['persentase'] / 100) * $rkas_rencana1[0]['total'];
                    $persentase += $st['persentase'];
                    $jumlah += $dana;
                    $jumlah1 += $dana_rencana[0]['jumlah'];
                  ?>
                    <tr>
                      <td>1.<?= $no; ?></td>
                      <td><?= $st['nama_program']; ?></td>
                      <td><?= $st['persentase']; ?>%</td>
                      <td>Rp.<?= number_format($dana, 0, '.', '.'); ?></td>
                      <td>Rp.<?= number_format($dana_rencana[0]['jumlah'], 0, '.', '.'); ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                  <tr>
                    <th colspan="2">Total</th>
                    <td><?= $persentase; ?>%</td>
                    <td><?= number_format($jumlah, 0, '.', '.');  ?></td>
                    <td><?= number_format($jumlah1, 0, '.', '.');  ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
            } else {
            ?>
              <p>Tidak Ada Data !</p>
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