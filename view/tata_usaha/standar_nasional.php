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
            <h3 class="text-themecolor m-b-0 m-t-0">Standar Nasional</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>tata_usaha">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Standar Nasional</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                <?php
                foreach ($tahun_ajaran as $ta) {
                ?>
                  <p class="mt-3">Tahun Ajaran <?= $ta['tahun_ajaran']; ?></p>
                  <table class="table table-bordered">
                    <thead>
                      <th>No</th>
                      <th>Nama Program</th>
                      <th>Persentase</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $standar = $crud->query("SELECT * FROM tbl_persentase_standar_nasional JOIN tbl_standar_nasional ON tbl_standar_nasional.idsnp = tbl_persentase_standar_nasional.npsn WHERE tahun_ajaran = '" . $ta['tahun_ajaran'] . "'");
                      foreach ($standar as $st) {
                      ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $st['nama_program']; ?></td>
                          <td><?= $st['persentase']; ?>%</td>
                          <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $ta['tahun_ajaran'] . $no; ?>">Ubah</button>
                          </td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?= $ta['tahun_ajaran'] . $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form action="<?= $url; ?>tata_usaha/standar/ubah.php" method="post">
                              <input type="hidden" name="standar" value="<?= $st['id_persentase_standar_nasional'] ?>">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="">Nama Program</label>
                                    <p><strong><?= $st['nama_program']; ?></strong></p>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Persentase</label>
                                    <input type="text" class="form-control" name="persentase" value="<?= $st['persentase']; ?>">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                <?php
                }
                ?>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= $url; ?>tata_usaha/standar/tambah.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Tahun Ajaran</label>
              <select name="tahun" class="form-control" id="" required>
                <?php
                for ($i = 2017; $i <= date('Y'); $i++) {
                ?>
                  <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>Nama Program</th>
                  <th>Persentase</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($nasional as $np) {
                ?>
                  <input type="hidden" name="standar[]" value="<?= $np['idsnp']; ?>">
                  <tr>
                    <td><?= $np['nama_program']; ?></td>
                    <td><input type="text" class="form-control" width="20px" placeholder="%" name="persentase[]" required></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>