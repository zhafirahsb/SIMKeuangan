<!DOCTYPE html>
<html lang="en">

<?php require('../../../view/bendahara/template/head.php'); ?>

<body class="fix-header card-no-border">

  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?php require('../../../view/bendahara/template/header.php'); ?>
    <?php require('../../../view/bendahara/template/sidebar.php'); ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Penerimaan SPP</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Penerimaan Dana</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4><u>Ubah Penerimaan SPP</u></h4>
            <form action="" method="POST">
              <div class="row mt-3">
                <div class="col-2">
                  <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="<?= $data[0]['tanggal']; ?>">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <label for="">Uraian</label>
                    <input type="text" class="form-control" name="uraian" value="<?= $data[0]['uraian']; ?>">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="">Total (Rp)</label>
                    <input type="text" class="form-control" name="total" value="<?= $data[0]['total']; ?>">
                  </div>
                </div>
                <div class="col-1 align-self-center">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Simpan" class="mt-4 mr-5 btn btn-default">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php require('../../../view/bendahara/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../../view/bendahara/template/jquery.php') ?>
</body>

</html>