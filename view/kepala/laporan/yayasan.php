<!DOCTYPE html>
<html lang="en">
<?php require('../../../view/kepala/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>
  <div id="main-wrapper">
    <?php require('../../../view/kepala/template/header.php') ?>
    <?php require('../../../view/kepala/template/sidebar.php') ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Dana Yayasan</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <div class="row">
              <div class="col-2 align-self-center">
                <h5>Pilih Tahun</h5>
              </div>
              <div class="col-2">
                <select name="tahun" class="form-control" id="">
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                </select>
              </div>
              <div class="col-1">
                <a href="" class="btn btn-primary">Lihat</a>
              </div>
              <div class="col-1">
                <a href="" class="btn btn-primary">Cetak Ke PDF</a>
              </div>
            </div>
            <hr>
            <h3 class="text-center">Realisasi Rekapitulasi Penggunaan Dana Yayasan<br>SMP Muhammadiyah 19<br>Tahun : 2018</h3>
            <hr>
            <div class="row">
              <div class="offset-3 col-7 text-center">
                <table class="table">
                  <thead class="">
                    <tr>
                      <th>Dana DIterima</th>
                      <th>Saldo Priode Sebelumnya</th>
                      <th>Total Dana BOS Periode Ini</th>
                      <th>Saldo BOS Periode Ini</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require('../../../view/kepala/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../../view/kepala/template/jquery.php') ?>
</body>

</html>