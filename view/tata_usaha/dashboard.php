<!DOCTYPE html>
<html lang="en">

<?php require('template/head.php'); ?>

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
    <?php require('template/header.php'); ?>

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php require('template/sidebar.php'); ?>

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
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ea accusamus aut vel est corporis consequatur possimus commodi rerum asperiores. Impedit nostrum soluta quod ad dignissimos ratione quam ipsam nobis.
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
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