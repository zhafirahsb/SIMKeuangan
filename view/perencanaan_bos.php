<!DOCTYPE html>
<html lang="en">
<?php require('template/head.php') ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php require('template/header.php') ?>

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php require('template/sidebar.php') ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perencaaan Dana BOS</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Perencaaan Dana BOS</li>
            </ol>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <p>Rencana Pemasukan</p>
                <form action="" method="post">
                  <div class="row">
                    <div class="col-2">
                      <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control" id="">
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label for="">Jumlah Siswa</label>
                        <input type="text" name="jumlah" class="form-control">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Dana Per Siswa</label>
                        <input type="text" name="dana" class="form-control">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Jumlah Dana</label>
                        <input type="text" name="jumlah_dana" class="form-control">
                      </div>
                    </div>
                    <div class="col-2 align-self-center">
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                      </div>
                    </div>
                  </div>
                </form>
                <div class="row">
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
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <!-- <a class="btn btn-default mb-5"></a> -->
                <p>Rencana Pengeluaran / Belanja</p>
                <table class="table table-bordered mt-3" id="">
                  <thead>
                    <th>Kode</th>
                    <th>Tahun</th>
                    <th>Nama Program</th>
                    <th>Persentase</th>
                    <th>Jumlah Dana</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($standar as $st) {
                    ?>
                      <tr>
                        <td>1.<?= $no; ?></td>
                        <td><?= $st['nama_program']; ?></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="" class="btn btn-default">Ubah</a>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
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