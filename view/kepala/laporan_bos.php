<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $tipe = $_POST['tipe'];
  $tahun = $_POST['tahun'];
  if ($tipe == 'rencana') {
    $laporan = $crud->read_data('bos_rkas', ['tahun_ajaran' => $tahun]);
    $standar = $crud->read_data('tbl_standar_nasional');
  } elseif ($tipe == 'realisasi') {
    $laporan1 = $crud->read_data('bos_realisasi_rekapitulasi', ['tahun_ajaran' => $tahun]);
    $standar = $crud->read_data('tbl_standar_nasional');
    $komponen = $crud->read_data('bos_realisasi_komponen');
  }
} elseif (isset($_POST['pdf'])) {
  $tipe = $_POST['tipe'];
  $tahun = $_POST['tahun'];
  if ($tipe == 'rencana') {
    header('Location:' . $url . 'bendahara/laporan/bos/laporan_pdf.php?tahun=' . $tahun);
    exit;
  } elseif ($tipe == 'realisasi') {
    header('Location:' . $url . 'bendahara/laporan/bos/laporan_realisasi_pdf.php?tahun=' . $tahun);
    exit;
  }
}
require('../../proses/yayasan.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Laporan Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Laporan Dana BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->

    <div class="card">
      <div class="card-block">
        <p>RENCANA KEGIATAN DAN ANGGARAN</p>
        <form action="" method="POST">
          <div class="row">
            <div class="col-2 align-self-center">
              <h5>Pilih Tahun</h5>
            </div>
            <div class="col-2">
              <select name="tahun" class="form-control">
                <?php
                for ($i = 2017; $i <= date('Y'); $i++) {
                ?>
                  <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <input type="hidden" name="tipe" value="rencana">
            <div class="col-1">
              <input type="submit" class="btn btn-primary" name="submit" value="Lihat">
            </div>
            <div class="col-1">
              <button type="submit" name="pdf" class="btn btn-primary">Cetak Ke PDF</button>
            </div>
          </div>
        </form>
        <hr>
        <?php
        if (@$standar && @count($laporan) > 0) {
        ?>
          <h3 class="text-center">Rencana Kegiatan dan Anggaran Sekolah (RKAS)<br>SMP Muhammadiyah 19<br>Tahun : <?= $tahun; ?></h3>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No Kode</th>
                <th>Nama Program</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach (@$standar as $st) {
                $dana_rencana = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $tahun . "'");
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $st['nama_program']; ?></td>
                  <td>Rp.<?= number_format($dana_rencana[0]['jumlah'], 0, '.', '.'); ?></td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
          <hr>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No Urut</th>
                <th>No Kode</th>
                <th>Uraian</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
            <tbody>
              <?php
              $no_detail = 1;
              $total = 0;
              foreach (@$standar as $st) {
              ?>
                <tr>
                  <td><?= $no_detail; ?></td>
                  <td></td>
                  <th>Program <?= $st['nama_program']; ?></th>
                  <td></td>
                </tr>
                <?php
                $no_detail++;
                $rkas = $crud->read_data('bos_rkas', ['npsn' => $st['idsnp'], 'tahun_ajaran' => $tahun]);
                $total_rkas = 0;
                foreach ($rkas as $rk) {
                ?>
                  <tr>
                    <td><?= $no_detail; ?></td>
                    <td></td>
                    <td>Sub-Program <?= $rk['sub_program']; ?></td>
                    <td></td>
                  </tr>
                  <?php
                  $no_detail++;
                  $rkas_detail = $crud->read_data('bos_rkas_detail', ['bos_rkas' => $rk['id_bos_rkas']]);
                  $total_detail = 0;
                  foreach ($rkas_detail as $rkd) {
                    $total_detail += $rkd['jumlah'];
                  ?>
                    <tr>
                      <td><?= $no_detail; ?></td>
                      <td><?= $rkd['no_kode']; ?></td>
                      <td><?= $rkd['uraian']; ?></td>
                      <td><?= number_format($rkd['jumlah'], 0, ',', '.'); ?></td>
                    </tr>
                  <?php
                    $no_detail++;
                  }
                  ?>
                  <tr>
                    <td><?= $no_detail; ?></td>
                    <td></td>
                    <td>Total Sub-Program <?= $rk['sub_program']; ?></td>
                    <td><?= number_format($total_detail, 0, ',', '.'); ?></td>
                  </tr>
                <?php
                  $total_rkas += $total_detail;
                  $no_detail++;
                }
                ?>
                <tr>
                  <td><?= $no_detail; ?></td>
                  <td></td>
                  <td>Total Program <?= $st['nama_program']; ?></td>
                  <td><?= number_format($total_rkas, 0, ',', '.'); ?></td>
                </tr>
              <?php
                $no_detail++;
                $total += $total_rkas;
              }
              ?>
              <tr>
                <td><?= $no_detail; ?></td>
                <td></td>
                <th>Total Belanja</th>
                <td><?= number_format($total, 0, ',', '.'); ?></td>
              </tr>
            </tbody>
            </tbody>
          </table>
        <?php
        } else {
        ?>
          <p>Laporan Tidak Tersedia</p>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card">
      <div class="card-block">
        <p>REALISASI PENGGUNAAN DANA TIAP JENIS ANGGARAN</p>
        <form action="" method="POST">
          <div class="row">
            <div class="col-2 align-self-center">
              <h5>Pilih Tahun</h5>
            </div>
            <div class="col-2">
              <select name="tahun" class="form-control">
                <?php
                for ($i = 2017; $i <= date('Y'); $i++) {
                ?>
                  <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <input type="hidden" name="tipe" value="realisasi">
            <div class="col-1">
              <input type="submit" class="btn btn-primary" name="submit" value="Lihat">
            </div>
            <div class="col-1">
              <button type="submit" name="pdf" class="btn btn-primary">Cetak Ke PDF</button>
            </div>
          </div>
        </form>
        <hr>
        <?php
        if (@$standar && @count($laporan1) > 0) {
        ?>
          <h3 class="text-center">Rekaputluasi Realisasi Penggunaan Dana Anggaran Sekolah<br>SMP Muhammadiyah 19<br>Tahun : <?= $tahun; ?></h3>
          <table class="table table-hover table-bordered table-responsive">
            <thead>
              <tr>
                <th rowspan="2">No Urut</th>
                <th rowspan="2">Program Kegiatan</th>
                <th colspan="<?= count($komponen); ?>">Penggunaan Dana BOS</th>
                <th rowspan="2">Jumlah</th>
              </tr>
              <tr>
                <?php
                foreach ($komponen as $k) {
                ?>
                  <td><?= $k['nama_program']; ?></td>
                <?php
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $total = 0;
              $total_sub = array_fill(0, count($komponen), 0);
              foreach ($standar as $st) {
              ?>
                <tr>
                  <td>1.<?= $no; ?></td>
                  <td><?= $st['nama_program']; ?></td>
                  <?php
                  $total_program = 0;
                  $no_komponen = 0;
                  foreach ($komponen as $k) {
                    $jumlah = $crud->query("SELECT SUM(bos_realisasi_detail_komponen.jumlah) jumlah FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_detail_komponen.relasi_id = bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi WHERE bos_realisasi_rekapitulasi.idsnp = '" . $st['idsnp'] . "' AND bos_realisasi_rekapitulasi.sub_program_id = '" . $k['id_bos_realisasi_komponen'] . "'");
                    if (is_null($jumlah[0]['jumlah'])) {
                      $jumlah = 0;
                    }
                  ?>
                    <td class="text-right"><?= number_format($jumlah[0]['jumlah'], 0, ',', '.'); ?></td>
                  <?php
                    $total_program += $jumlah[0]['jumlah'];
                    $total_sub[$no_komponen] += $jumlah[0]['jumlah'];
                    $no_komponen++;
                  }
                  ?>
                  <td><?= number_format($total_program, 0, ',', '.'); ?></td>
                </tr>
              <?php
                $total += $total_program;
                $no++;
              }
              ?>
              <tr class="text-right">
                <td></td>
                <td></td>
                <?php
                $no_komponen = 0;
                foreach ($komponen as $k) {
                ?>
                  <td><?= number_format($total_sub[$no_komponen], 0, ',', '.'); ?></td>
                <?php
                  $no_komponen++;
                }
                ?>
                <td><?= number_format($total, 0, ',', '.'); ?></td>
              </tr>
            </tbody>
          </table>
          <hr>
        <?php
        } else {
        ?>
          <p>Laporan Tidak Tersedia</p>
        <?php
        }
        ?>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>