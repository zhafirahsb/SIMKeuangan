<!DOCTYPE html>
<html lang="en">
<?php require('../../view/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?php require('../../view/template/header.php') ?>
    <?php require('../../view/template/sidebar.php') ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Perencanaan Dana</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4><u>Perencanaan Dana Yayasan (Pendapatan)</u></h4>
            <form action="" method="POST">
              <div class="row">
                <div class="col-2">
                  <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" class="form-control" name="tahun" id="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="">Jumlah Siswa</label>
                    <input type="number" class="form-control" name="jml_siswa" id="">
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="">Jumlah Dana (Rp)</label>
                    <input type="number" class="form-control" name="jml_dana" id="">
                  </div>
                </div>
                <div class="col-1 align-self-center">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Tambah" class="mt-4 mr-5 btn btn-default">
                  </div>
                </div>
              </div>
            </form>
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Tahun</th>
                  <th>Keterangan</th>
                  <th colspan="7">Uraian</th>
                  <th>Jumlah</th>
                  <th>ِAksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($pendapatan as $p) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $p['tahun']; ?></td>
                    <td><?= $p['keterangan']; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'sis' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? '12' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'bln' : ''; ?></td>
                    <td>Rp. <?= number_format($p['jumlah_iuran'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12 : $p['jumlah_iuran'], 0, ',', '.'); ?></td>
                    <!-- <td>Rp. <?= number_format($p['jumlah_iuran'], 0, ',', '.'); ?></td> -->
                    <td></td>
                  </tr>
                <?php
                  $no++;
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
                <a href="tambah.php" class="btn btn-primary mb-5">Tambah Data</a>
                <table class="table table-bordered mt-3" id="example">
                  <thead>
                    <tr class="text-center">
                      <th>Tahun</th>
                      <th>Uraian</th>
                      <th colspan="2" width="20%">Satuan</th>
                      <th colspan="2" width="20%">Volume</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <?php
                  foreach ($pengeluaran as $pe) {
                  ?>
                    <tr>
                      <td><?= $pe['tahun']; ?></td>
                      <td><?= $pe['uraian']; ?></td>
                      <td><?= $pe['nilai_satuan'] > 0 ? $pe['nilai_satuan'] : '-'; ?></td>
                      <td><?= $pe['satuan']; ?></td>
                      <td><?= $pe['nilai_volume'] > 0 ? $pe['nilai_volume'] : '-'; ?></td>
                      <td><?= $pe['volume']; ?></td>
                      <td><?= $pe['jumlah'] > 0 ? 'Rp .' . number_format($pe['jumlah'], 0, ',', '.') : '-'; ?></td>
                      <td>Rp. <?= number_format($pe['total'], 0, '.', '.'); ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require('../../view/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../view/template/jquery.php') ?>
</body>

</html>