<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    "uraian='" . $_POST['uraian'] . "'",
    "total='" . $_POST['total'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
  );
  if (empty($_POST['uraian']) || empty($_POST['total']) || !is_numeric($_POST['total']) || empty($_POST['tanggal'])) {
    $_SESSION['notice'] = 'Data yang Anda masukan salah !';
    header('Location:' . $url . 'view/bendahara/penerimaan_spp_ubah.php?id=' . $_POST['id']);
    exit;
  }
  $crud->update('yayasan_penerimaan_spp', $data, 'id_yayasan_penerimaan_spp', $_POST['id']);
  header('Location:' . $url . 'view/bendahara/penerimaan_spp.php');
  exit;
}
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
        <h4><u>Penerimaan SPP</u></h4>
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
        $id = $_GET['id'];
        $data = get_penerimaan_spp($id);
        ?>
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="row mt-3">
            <div class="col-2">
              <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?= $data[0]['tanggal']; ?>">
              </div>
            </div>
            <div class="col-4">
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
            <div class="col-2 align-self-center">
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="submit" value="Simpan" class="mt-4 mr-5 btn btn-primary">
                  </div>
                  <div class="col-1">
                    <a href="<?= $url; ?>view/bendahara/penerimaan_spp.php" class="mt-4 mr-5 btn btn-default">Batal</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>