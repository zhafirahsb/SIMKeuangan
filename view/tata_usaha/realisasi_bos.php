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
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="card">
      <div class="card-block">
        <h4><u>Pendapatan BOS</u></h4>
        <form action="" method="post">
          <div class="row">
            <div class="col-2">
              <div class="form-group">
                <label>Tahun</label>
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
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Jumlah Dana</label>
                <input type="number" name="jumlah_dana" class="form-control">
              </div>
            </div>
            <div class="col-1 align-self-center">
              <input type="submit" value="Simpan" name="submit" class="btn btn-primary" onclick="<?php tambah_realisasi_pendapatan_bos(); ?>">
            </div>
          </div>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Jumlah Dana</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pendapatan = get_realisasi_pendapatan();
            foreach ($pendapatan as $pe) {
            ?>
              <tr>
                <td><?= $pe['tahun']; ?></td>
                <td><?= $pe['nominal']; ?></td>
                <td>
                  <a href="realisasi_bos_ubah.php?id=<?= $pe['id_bos_realisasi_pendapatan']; ?>" class="btn btn-default">Ubah</a>
                  <a href="hapus_pendapatan.php?id=<?= $pe['id_bos_realisasi_pendapatan']; ?>" class="btn btn-default">Hapus</a>
                </td>
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
            <a href="<?=$url;?>view/tata_usaha/realisasi_bos_tambah.php" class="btn btn-primary mb-5">Tambah Data</a>
            <table class="table table-bordered mt-3" id="example">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Kode</th>
                <th>No Bukti</th>
                <th>Uraian</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                $realisasi = get_realisasi_pengeluaran_bos();
                $no = 0;
                foreach ($realisasi as $re) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= date('d/m/Y', strtotime($re['tanggal'])); ?></td>
                    <td><?= $re['no_kode']; ?></td>
                    <td><?= $re['no_bukti']; ?></td>
                    <td><?= $re['uraian']; ?></td>
                    <td>Rp.<?= number_format($re['jumlah'], 0, ',', '.'); ?></td>
                    <td><?= $re['status']; ?></td>
                    <td>
                      <a href="ubah_data.php?realisasi=<?= $re['id_relasi'] ?>&detail=<?= $re['id_bos_realisasi_detail_komponen'] ?>" class="btn btn-default">Ubah</a>
                      <a href="hapus_data.php?realisasi=<?= $re['id_relasi'] ?>&detail=<?= $re['id_bos_realisasi_detail_komponen'] ?>" class="btn btn-default">Hapus</a>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
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
