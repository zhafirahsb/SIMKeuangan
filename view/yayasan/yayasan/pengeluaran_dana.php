<!DOCTYPE html>
<html lang="en">

<?php require('../../../view/tata_usaha/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">

    <?php require('../../../view/tata_usaha/template/header.php') ?>
    <?php require('../../../view/tata_usaha/template/sidebar.php') ?>

    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Pengeluaran Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Pengeluaran Dana</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4><u>Pengeluaran Dana Yayasan</u></h4>
            <form action="" method="post">
              <div class="row mt-3">
                <div class="col-2">
                  <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <label for="">Uraian</label>
                    <input type="text" class="form-control" name="uraian">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="">Total (Rp)</label>
                    <input type="text" class="form-control" name="total">
                  </div>
                </div>
                <div class="col-1 align-self-center">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Tambah" class="mt-4 mr-5 btn btn-default">
                  </div>
                </div>
              </div>
            </form>
            <table class="table table-bordered mt-3" id="example">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jumlah</th>
                <th>Aksi</th>
              </thead>
              <?php
              $no = 1;
              foreach ($pengeluaran as $sp) {
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= date('d-m-Y', strtotime($sp['tanggal'])); ?></td>
                  <td><?= $sp['uraian']; ?></td>
                  <td>Rp. <?= number_format($sp['jumlah'], 0, ',', '.'); ?></td>
                  <td>
                    <a href="#" class="btn btn-default">Ubah</a>|
                    <a href="hapus.php?pengeluaran=<?= $sp['id']; ?>" onclick="return confirm('Akan Menghapus Data Ini ?')" class="btn btn-default">Hapus</a>
                  </td>
                </tr>
              <?php
                $no++;
              }
              ?>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php require('../../../view/tata_usaha/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../../view/tata_usaha/template/jquery.php') ?>
</body>

</html>