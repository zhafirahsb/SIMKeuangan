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
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Perencanaan BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->

    <div class="card">
      <div class="card-block">
        <h4><u>Pengeluaran Dana Yayasan</u></h4>
        <button class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
        <table class="table table-bordered mt-3" id="example">
          <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Jumlah</th>
          </thead>
          <?php
          $pengeluaran = get_pengeluaran_yys();
          $no = 1;
          foreach ($pengeluaran as $sp) {
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= date('d-m-Y', strtotime($sp['tanggal'])); ?></td>
              <td><?= $sp['uraian']; ?></td>
              <td>Rp. <?= number_format($sp['jumlah'], 0, ',', '.'); ?></td>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= $url; ?>bendahara/yayasan/perencanaan/tambah_pendapatan.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Tahun</label>
              <select name="tahun" class="form-control" required>
                <option value="">Pilih Tahun</option>
                <?php
                for ($i = 2017; $i <= date('Y'); $i++) { ?>
                  <option value='<?= $i ?>'><?= $i ?></option>";
                <?php }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Jumlah Siswa</label>
              <input type="number" name="siswa" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Jumlah Iuran</label>
              <input type="number" name="iuran" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">Batal</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>