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

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
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
            <h3 class="text-themecolor m-b-0 m-t-0">Perencaaan Dana BOS</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Perencanaan Dana BOS</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-12">
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
                        foreach ($dana as $d) {
                        ?>
                          <option value="<?= $d['tahun'] ?>"><?= $d['tahun'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Pendapatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="jumlah" class="form-control">
                    </div>
                  </div>
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  <input type="hidden" name="tipe" value="pendapatan">
                  <a href="<?= $url; ?>perencanaan_bos" class="btn btn-default">Batal</a>
                </form>
              </div>
            </div>
          </div> -->
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
                        <?php foreach ($standar as $st) { ?>
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
                    <!-- <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No Kode</label>
                      <div class="col-sm-10">
                        <input type="text" name="no_kode[]" class="form-control" required>
                      </div>
                    </div> -->
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
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  <a href="<?= $url; ?>tata_usaha/perencanaan_bos" class="btn btn-default">Batal</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require('template/footer.php') ?>
    </div>
  </div>
  <?php require('template/jquery.php') ?>
  <!-- Modal -->

  <script>
    $('#tambah').click(function() {
      console.log('pencet');
      $('#uraian').append(`
        <hr>
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
      `);
    });
  </script>
</body>

</html>