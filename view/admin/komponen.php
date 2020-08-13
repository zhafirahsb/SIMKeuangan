<?php
session_start();
require('../../url.php');
require('../../proses/komponen.php');
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</a>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Komponen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $komponen = getkomponen();
                $no = 0;
                foreach ($komponen as $u) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $u['nama_program']; ?></td>
                    <td>
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $no; ?>">Ubah</a>
                      <a href="<?= $url; ?>admin/komponen/hapus.php?komponen=<?= $u['id_bos_realisasi_komponen']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini ?')">Hapus</a>
                    </td>
                    <div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form action="<?= $url; ?>admin/komponen/ubah.php" method="post">
                          <input type="hidden" name="id" value="<?= $u['id_bos_realisasi_komponen']; ?>">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Komponen</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Nama Komponen</label>
                                  <input type="text" class="form-control" name="komponen" value="<?= $u['nama_program']; ?>">
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