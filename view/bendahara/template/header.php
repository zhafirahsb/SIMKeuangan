<header class="topbar">
  <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= $url; ?>">
        <!-- Logo icon -->
        <b>
          <img src="<?= $url; ?>assets/gambar/logo.jpg" height="90px" alt="homepage" class="dark-logo" />
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->

        </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span>
          <!-- dark Logo text -->
          <!-- <img src="<?= $url; ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
        </span>
      </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav mr-auto mt-md-0 ">
        <!-- This is  -->
        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        <li class="nav-item hidden-sm-down">
          <form class="app-search p-l-20">
            <h2 class="text-white">SMP Muhammadiyah - 19 Pematang Siantara</h2>
          </form>
        </li>
      </ul>
      <!-- ============================================================== -->
      <!-- User profile and search -->
      <!-- ============================================================== -->
      <ul class="navbar-nav my-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <img src="<?= $url; ?>assets/images/users/" alt="user" class="profile-pic m-r-5" />Nama User -->
            <i class="fa fa-user-circle m-r-20 m-t-5" aria-hidden="true" style="font-size: 30px"></i>
            <?= $_SESSION['user']; ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>