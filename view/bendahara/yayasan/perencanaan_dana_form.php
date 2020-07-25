<!DOCTYPE html>
<html lang="en">

<?php require('../../../view/bendahara/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">

    <?php require('../../../view/bendahara/template/header.php'); ?>
    <?php require('../../../view/bendahara/template/sidebar.php'); ?>

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
            <h3 class="text-themecolor m-b-0 m-t-0">Perencaaan Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Perencanaan Dana BOS</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <h3><u>Perencanaan Dana Yayasan (Pengeluaran)</u></h3>
                <form action="" method="POST">
                  <div class="form-group row mt-3">
                    <label class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                      <select name="tahun_ajaran" class="form-control" required>
                        <option value="">Tahun</option>
                        <?php for ($i = 2017; $i <= date('Y'); $i++) {
                        ?>
                          <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                      <input type="text" name="uraian" class="form-control" id="">
                    </div>
                  </div>
                  <div class="form-group row mt-3">
                    <label class="col-sm-2 col-form-label">Sub Uraian</label>
                    <div class="col-sm-10">
                      <input type="text" name="sub_uraian" class="form-control" id="">
                    </div>
                  </div>
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <td>Detail Uraian</td>
                        <td colspan="2" width="20%">Satuan</td>
                        <td colspan="2" width="20%">Volume</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                      </tr>
                    </thead>
                    <tbody id="datanya">
                      <tr>
                        <td><input type="text" name="detail_uraian[]" class="form-control" id=""></td>
                        <td><input type="number" name="jumlah_satuan[]" class="form-control" id=""></td>
                        <td><input type="text" name="satuan[]" class="form-control" id=""></td>
                        <td><input type="number" name="jumlah_volume[]" class="form-control" id=""></td>
                        <td><input type="text" name="volume[]" class="form-control" id=""></td>
                        <td><input type="number" name="jumlah[]" class="form-control" id=""></td>
                        <td><input type="number" name="total[]" class="form-control" id=""></td>
                      </tr>
                    </tbody>
                  </table>
                  <button class="btn btn-primary" type="button" id="tambah">Tambah Detail</button>
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  <a href="<?= $url; ?>bendahara/yayasan/perencanaan/" class="btn btn-secondary">Batal</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php require('../../../view/bendahara/template/footer.php'); ?>

    </div>
  </div>

  <?php require('../../../view/bendahara/template/jquery.php'); ?>

  <script>
    $('#tambah').click(function() {
      console.log('pencet');
      $('#datanya').append(`
        <tr>
          <td><input type="text" name="detail_uraian[]" class="form-control" id=""></td>
          <td><input type="number" name="jumlah_satuan[]" class="form-control" id=""></td>
          <td><input type="text" name="satuan[]" class="form-control" id=""></td>
          <td><input type="number" name="jumlah_volume[]" class="form-control" id=""></td>
          <td><input type="text" name="volume[]" class="form-control" id=""></td>
          <td><input type="number" name="jumlah[]" class="form-control" id=""></td>
          <td><input type="number" name="total[]" class="form-control" id=""></td>
        </tr>
      `);
    });
  </script>
</body>

</html>