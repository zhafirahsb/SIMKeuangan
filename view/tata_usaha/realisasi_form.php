<!DOCTYPE html>
<html lang="en">
<?php require('template/head.php') ?>

<body class="fix-header card-no-border">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?php require('template/header.php') ?>
    <?php require('template/sidebar.php') ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Realisasi</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= $url; ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">BOS</li>
              <li class="breadcrumb-item active">Realisasi Dana BOS</li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4><u>Form Tambah Data Pengeluaran BOS</u></h4>
            <form class="mt-5" action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="realisasi" value="<?= @$id_realisasi; ?>">
              <input type="hidden" name="detail" value="<?= @$detail_realisasi; ?>">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-8">
                  <select name="tahun" class="form-control" required>
                    <?php
                    foreach ($pendapatan as $p) {
                    ?>
                      <option value="<?= $p['tahun'] ?>" <?= @$realisasi['tahun_ajaran'] == $p['tahun'] ? 'selected' : ''; ?>><?= $p['tahun']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Program Standar Pendidikan</label>
                <div class="col-sm-8">
                  <select name="standar" class="form-control">
                    <?php foreach ($standar as $st) { ?>
                      <option value="<?= $st['idsnp'] ?>" <?= @$realisasi['idsnp'] == $st['idsnp'] ? 'selected' : ''; ?>><?= $st['nama_program']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Komponen Penggunaan Dana BOS</label>
                <div class="col-sm-8">
                  <select name="komponen" class="form-control">
                    <?php foreach ($sub_program as $sp) { ?>
                      <option value="<?= $sp['id_bos_realisasi_komponen'] ?>" <?= @$realisasi['idsnp'] == $sp['id_bos_realisasi_komponen'] ? 'selected' : ''; ?>><?= $sp['nama_program']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div id="detail">
                <hr>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" name="tanggal[]" class="form-control" value="<?= @$detail['tanggal']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">No. Kode</label>
                  <div class="col-sm-8">
                    <input type="text" name="kode[]" class="form-control" value="<?= @$detail['no_kode']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">No. Bukti</label>
                  <div class="col-sm-8">
                    <input type="text" name="bukti[]" class="form-control" value="<?= @$detail['no_bukti']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Uraian</label>
                  <div class="col-sm-8">
                    <textarea name="uraian[]" class="form-control"><?= @$detail['uraian']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Jumlah (Rp)</label>
                  <div class="col-sm-8">
                    <input type="number" name="jumlah[]" class="form-control" value="<?= @$detail['jumlah']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Upload</label>
                  <div class="col-sm-8">
                    <input type="file" name="upload[]" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <button type="button" class="btn btn-primary btn-info" id="tambah-uraian">Tambah Uraian</button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                  <a href="<?= $url; ?>tata_usaha/realisasi/" class="btn btn-secondary">Batal</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php require('template/footer.php') ?>

      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php require('template/jquery.php') ?>
  <script>
    $(document).ready(function() {
      $('#tambah-uraian').click(function() {
        $('#detail').append(`
        <hr>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tanggal</label>
          <div class="col-sm-8">
            <input type="date" name="tanggal[]" class="form-control"">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">No. Kode</label>
          <div class="col-sm-8">
            <input type="text" name="kode[]" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">No. Bukti</label>
          <div class="col-sm-8">
            <input type="text" name="bukti[]" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Uraian</label>
          <div class="col-sm-8">
            <textarea name="uraian[]" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Jumlah (Rp)</label>
          <div class="col-sm-8">
            <input type="number" name="jumlah[]" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Upload</label>
          <div class="col-sm-8">
            <input type="file" name="upload[]" class="form-control">
          </div>
        </div>
        `);
      });
    });
  </script>
</body>

</html>