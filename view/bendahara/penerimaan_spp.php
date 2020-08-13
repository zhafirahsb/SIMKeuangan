<?php
session_start();
require('../../url.php');
require('../../proses/yayasan.php');
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
        <h3 class="text-themecolor m-b-0 m-t-0">Penerimaan SPP</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>view/bendahara">Home</a></li>
          <li class="breadcrumb-item active">Penerimaan SPP</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <?php
    if (isset($_SESSION['notice'])) {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['notice']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
      unset($_SESSION['notice']);
    }
    ?>
    <div class="card">
      <div class="card-block">
        <h4><u>Penerimaan SPP</u></h4>
        <form action="" method="POST">
          <div class="row mt-3">
            <div class="col-2">
              <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
              </div>
            </div>
            <div class="col-5">
              <div class="form-group">
                <label for="">Uraian</label>
                <input type="text" class="form-control" name="uraian" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="">Total (Rp)</label>
                <input type="text" class="form-control" name="total" required>
              </div>
            </div>
            <div class="col-1 align-self-center">
              <div class="form-group">
                <input type="submit" name="submit" value="Tambah" class="mt-4 mr-5 btn btn-default" onclick="<?php tambah_penerimaan_spp(); ?>">
              </div>
            </div>
          </div>
        </form>
        <table class="table table-bordered mt-3" id="">
          <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </thead>
          <?php
          $spp = get_penerimaan_spp();
          $no = 1;
          foreach ($spp as $sp) {
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= date('d-m-Y', strtotime($sp['tanggal'])); ?></td>
              <td><?= $sp['uraian']; ?></td>
              <td>Rp. <?= number_format($sp['total'], 0, ',', '.'); ?></td>
              <td>
                <a href="penerimaan_spp_ubah.php?id=<?= $sp['id_yayasan_penerimaan_spp']; ?>" class="btn btn-warning">Ubah</a>
                <a href="penerimaan_spp_hapus.php?id=<?= $sp['id_yayasan_penerimaan_spp']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data Ini ?')">Hapus</a>
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
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>