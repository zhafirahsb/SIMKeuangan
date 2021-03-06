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
            <form class="mt-5" action="" method="POST">
              <input type="hidden" name="realisasi" value="<?= @$id_realisasi; ?>">
              <input type="hidden" name="detail" value="<?= @$detail_realisasi; ?>">
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
                      <option value="<?= $sp['id'] ?>" <?= @$realisasi['idsnp'] == $sp['id'] ? 'selected' : ''; ?>><?= $sp['nama_program']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal" class="form-control" value="<?= @$detail['tanggal']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">No. Kode</label>
                <div class="col-sm-8">
                  <input type="text" name="kode" class="form-control" value="<?= @$detail['no_kode']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">No. Bukti</label>
                <div class="col-sm-8">
                  <input type="text" name="bukti" class="form-control" value="<?= @$detail['no_bukti']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Uraian</label>
                <div class="col-sm-8">
                  <textarea name="uraian" class="form-control" cols="30" rows="10"><?= @$detail['uraian']; ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jumlah (Rp)</label>
                <div class="col-sm-8">
                  <input type="number" name="jumlah" class="form-control" value="<?= @$detail['jumlah']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                  <button type="reset" class="btn btn-default">Batal</button>
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

</body>

</html>