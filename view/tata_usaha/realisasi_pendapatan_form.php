<!DOCTYPE html>
<html lang="en">
<?php require('template/head.php') ?>

<body class="fix-header card-no-border">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?php require('template/header.php') ?>
    <?php require('template/sidebar.php') ?>
    <div class="page-wrapper">
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
        <div class="card">
          <div class="card-block">
            <h4><u>Form Ubah Realisasi Pendapatan BOS</u></h4>
            <?php
            if (isset($_SESSION['notice1'])) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['notice1']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
              unset($_SESSION['notice1']);
            }
            ?>
            <form action="" method="post">
              <input type="hidden" name="realisasi" value="<?= $pendapatan[0]['id_bos_realisasi_pendapatan']; ?>">
              <div class="row">
                <div class="col-2">
                  <div class="form-group">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control">
                      <?php
                      for ($i = 2017; $i <= date('Y'); $i++) {
                      ?>
                        <option <?= $i == $pendapatan[0]['tahun'] ? 'selected' : ''; ?> value="<?= $i; ?>"><?= $i; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Jumlah Dana</label>
                    <input type="text" name="jumlah_dana" class="form-control" value="<?= $pendapatan[0]['nominal']; ?>">
                  </div>
                </div>
                <div class="col-1 align-self-center">
                  <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php require('template/footer.php') ?>

      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php require('template/jquery.php') ?>

</body>

</html>