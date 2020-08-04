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
            <a href="tambah.php" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah</a>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
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
                    <td><?= $p['role']; ?></td>
                    <td>
                      <a href="ubah.php?komponen=<?= $u['id']; ?>">Ubah</a> |
                      <a href="">Hapus</a>
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
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>
