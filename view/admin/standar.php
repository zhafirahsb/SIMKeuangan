<?php
session_start();
require('../../url.php');
require('../../proses/pengguna.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
$nasional = $crud->read_data('tbl_standar_nasional');
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
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</a>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Program</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($nasional as $p) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $p['nama_program']; ?></td>
                    <td>
                      <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $no; ?>">Ubah</a>
                      <a href="<?= $url; ?>admin/standar/hapus.php?standar=<?= $p['idsnp']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini ?')">Hapus</a>
                    </td>
                    <div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form action="<?= $url; ?>admin/standar/ubah.php" method="post">
                          <input type="hidden" name="id" value="<?= $p['idsnp']; ?>">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Nama Program</label>
                                  <input type="text" class="form-control" name="program" value="<?= $p['nama_program']; ?>">
                                </div>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= $url; ?>admin/standar/tambah.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Standar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Program</label>
              <input type="text" class="form-control" name="program">
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