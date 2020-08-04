<?php 
session_start();
require('../../proses/function.php');
require('../../url.php'); 
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
          <h1>Selamat Datang Di Halaman <?=$_SESSION['user'];?></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="card">
          <div class="card-block">
            <div class="row">
              <div class="col-8">
                <h1>0</h1>
                Penerimaan RKAS
              </div>
              <div class="col-4">
                <h1><i class="fa fa-group"></i></h1>
              </div>
            </div>
            <hr>
            <h6 class="text-center"><a href="btn btn-outline ">Selengkapnya</a></h6>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card">
          <div class="card-block">
            <div class="row">
              <div class="col-8">
                <h1>0</h1>
                RKAS
              </div>
              <div class="col-4">
                <h1><i class="fa fa-desktop"></i></h1>
              </div>
            </div>
            <hr>
            <h6 class="text-center"><a href="btn btn-outline ">Selengkapnya</a></h6>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card">
          <div class="card-block">
            <div class="row">
              <div class="col-8">
                <h1>0</h1>
                Realisasi
              </div>
              <div class="col-4">
                <h1><i class="fa fa-group"></i></h1>
              </div>
            </div>
            <hr>
            <h6 class="text-center"><a href="btn btn-outline ">Selengkapnya</a></h6>
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
