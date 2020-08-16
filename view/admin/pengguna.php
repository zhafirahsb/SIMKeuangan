<?php
session_start();
require('../../url.php');
require('../../proses/pengguna.php');
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
                  <th>Username</th>
                  <th>Password</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pengguna = getpengguna();
                $no = 0;
                foreach ($pengguna as $p) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $p['username']; ?></td>
                    <td><?= $p['password']; ?></td>
                    <td><?= $p['role']; ?></td>
                    <td>
                      <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $no; ?>">Ubah</a>
                      <a href="<?= $url; ?>admin/pengguna/hapus.php?user=<?= $p['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini ?')">Hapus</a>
                    </td>
                    <div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form action="<?= $url; ?>admin/pengguna/ubah.php" method="post">
                          <input type="hidden" name="id" value="<?= $p['id_user']; ?>">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $p['username']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="username" value="<?= $p['password']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control">
                                  <option value="">Pilih Jabatan</option>
                                  <option <?= $p['role'] == 'Admin' ? 'selected' : ''; ?> value="Admin">Admin</option>
                                  <option <?= $p['role'] == 'Bendahara Yayasan' ? 'selected' : ''; ?> value="Bendahara Yayasan">Bendahara Yayasan</option>
                                  <option <?= $p['role'] == 'Tata Usaha' ? 'selected' : ''; ?> value="Tata Usaha">Tata Usaha</option>
                                  <option <?= $p['role'] == 'Yayasan' ? 'selected' : ''; ?> value="Yayasan">Yayasan</option>
                                  <option <?= $p['role'] == 'Kepala Sekolah' ? 'selected' : ''; ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                </select>
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
      <form action="<?= $url; ?>admin/pengguna/tambah.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" id="">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select name="jabatan" class="form-control">
                <option value="">Pilih Jabatan</option>
                <option value="Admin">Admin</option>
                <option value="Bendahara Yayasan">Bendahara Yayasan</option>
                <option value="Tata Usaha">Tata Usaha</option>
                <option value="Yayasan">Yayasan</option>
                <option value="Kepala Sekolah">Kepala Sekolah</option>
              </select>
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