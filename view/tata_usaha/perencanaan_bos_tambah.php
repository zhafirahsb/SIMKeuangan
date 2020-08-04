<?php 
session_start();
require('../../url.php'); 
require('../../proses/bos.php'); 
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
            <h3><u>Perencanaan Dana BOS (Pendapatan)</u></h3>
            <form action="" method="POST">
              <div class="form-group row mt-3">
                <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-10">
                  <select name="tahun_ajaran" class="form-control" required>
                    <option value="">Tahun Ajaran</option>
                    <?php
                    $dana = get_rkas_rencana();
                    foreach ($dana as $d) {
                    ?>
                      <option value="<?= $d['tahun'] ?>"><?= $d['tahun'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <!-- <input type="text" name="tahun_ajaran" class="form-control mt-3 mb-3" placeholder="Tahun Ajaran" required> -->
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Pendapatan</label>
                <div class="col-sm-10">
                  <input type="text" name="jumlah" class="form-control">
                </div>
              </div>
              <input type="submit" name="submit" value="Submit" class="btn btn-success" onclick="<?php rencana_pendapatan_bos(); ?>">
              <input type="hidden" name="tipe" value="pendapatan">
              <a href="<?= $url; ?>perencanaan_bos" class="btn btn-default">Batal</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <h3><u>Perencanaan Dana BOS (Belanja)</u></h3>
            <form action="" method="POST">
              <input type="hidden" name="tipe" value="belanja">
              <div class="form-group row mt-3">
                <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-10">
                  <select name="tahun_ajaran" class="form-control" required>
                    <option value="">Tahun Ajaran</option>
                    <?php
                    foreach ($dana as $d) {
                    ?>
                      <option value="<?= $d['tahun'] ?>"><?= $d['tahun'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <!-- <input type="text" name="tahun_ajaran" class="form-control mt-3 mb-3" placeholder="Tahun Ajaran" required> -->
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Standar Nasional</label>
                <div class="col-sm-10">
                  <select name="nama_program" class="form-control mt-2">
                    <?php 
                    $standar = get_standar_nasional();
                    foreach ($standar as $st) { ?>
                      <option value="<?= $st['idsnp']; ?>"><?= $st['nama_program']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub Program</label>
                <div class="col-sm-10">
                  <input type="text" name="sub_program" class="form-control" required>
                </div>
              </div>
              <hr>
              <div id="uraian">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_kode[]" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Uraian</label>
                  <div class="col-sm-10">
                    <input type="text" name="uraian[]" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah[]" class="form-control" required>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-primary" id="tambah">Tambah Uraian</button>
              <input type="submit" name="submit" value="Submit" class="btn btn-success" onclick="<?php tambah_rencana_belanja_bos(); ?>">
              <a href="<?= $url; ?>view/tata_usaha/perencanaan_bos.php" class="btn btn-default">Batal</a>
            </form>
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
<script>
  
</script>

</body>

</html>