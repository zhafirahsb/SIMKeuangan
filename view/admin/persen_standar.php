<?php
session_start();
require('../../url.php');
require('../../proses/komponen.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
// $standar = $crud->query('tbl_persentase_standar_nasional ');
$nasional = $crud->read_data('tbl_standar_nasional');
$tahun_ajaran = $crud->query('SELECT DISTINCT(tahun_ajaran) FROM tbl_persentase_standar_nasional');
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button> -->
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
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= $url; ?>admin/komponen/tambah.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Komponen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Komponen</label>
              <input type="text" class="form-control" name="komponen">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>