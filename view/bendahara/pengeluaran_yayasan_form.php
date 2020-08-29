<?php
session_start();
require('../../url.php');
require('../../proses/yayasan.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
$pengeluaran = $crud->read_data('yayasan_realisasi_pengeluaran', ['id_yayasan_realisasi_pengeluaran' => $_GET['id']]);
$jenis = $crud->query("SELECT DISTINCT(jenis_biaya) FROM yayasan_rencana_pengeluaran");
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Realisasi Dana Yayasan</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->

    <div class="card">
      <div class="card-block">
        <h4><u>Pengeluaran Dana Yayasan</u></h4>
        <?php
        if (isset($_SESSION['notice'])) {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['notice']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
          unset($_SESSION['notice']);
        }
        ?>
        <form action="<?= $url; ?>bendahara/yayasan/pengeluaran/ubah_pengeluaran.php" method="post">
          <input type="hidden" name="id" value="<?= $pengeluaran[0]['id_yayasan_realisasi_pengeluaran']; ?>">
          <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $pengeluaran[0]['tanggal']; ?>">
          </div>
          <div class="form-group">
            <label for="">Uraian</label>
            <input type="text" name="uraian" class="form-control" value="<?= $pengeluaran[0]['uraian']; ?>">
          </div>
          <div class="form-group">
            <label for="">Jenis Biaya</label>
            <select name="jenis" class="form-control" id="">
              <option value="">Pilih</option>
              <?php
              foreach ($jenis as $j) {
              ?>
                <option <?= $j['jenis_biaya'] == $pengeluaran[0]['jenis_biaya'] ? 'selected' : ''; ?> value="<?= $j['jenis_biaya']; ?>"><?= $j['jenis_biaya']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class=" form-group">
            <label for="">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= $pengeluaran[0]['jumlah']; ?>">
          </div>
          <a href=" <?= $url; ?>view/bendahara/pengeluaran_yayasan.php" class="btn btn-secondary">Batal</a>
          <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?= $url; ?>bendahara/yayasan/pengeluaran/tambah_pengeluaran.php" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Uraian</label>
              <input type="text" name="uraian" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Jumlah</label>
              <input type="number" name="jumlah" class="form-control" required>
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