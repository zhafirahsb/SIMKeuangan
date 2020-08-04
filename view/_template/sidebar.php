<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">

        <!-- admin -->
        <?php if ($_SESSION['user']=='Admin') { ?>
          <li class="">
            <a href="<?= $url; ?>view/admin" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li class="">
            <a href="<?= $url; ?>view/admin/pengguna.php" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Data pengguna</a>
          </li>
          <li class="">
            <a href="<?= $url; ?>view/admin/komponen.php" class="waves-effect"><i class="fa fa-edit  m-r-10" aria-hidden="true"></i>Komponen BOS</a>
          </li>
          <li class="">
            <a href="<?= $url; ?>proses/proses_logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
          </li>
        <?php } ?>

        <!-- Bendahara Yayasan -->
        <?php if ($_SESSION['user']=='Bendahara Yayasan') { ?>
          <li class="active">
            <a href="<?= $url; ?>view/bendahara" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li><a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>BOS</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>view/bendahara/perencanaan_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana Bos</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/bendahara/realisasi_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Realisasi Dana BOS</a>
              </li>
            </ul>
          </li>

          <li><a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>YAYASAN</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>view/bendahara/perencanaan_yayasan.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/bendahara/penerimaan_spp.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Penerimaan SPP</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/bendahara/pengeluaran_yayasan.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Pengeluaran Dana</a>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Laporan Rekapitulasi Dana</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>bendahara/laporan/bos" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana BOS</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>bendahara/laporan/yayasan" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana Yayasan</a>
              </li>
            </ul>
          </li> -->
          <li class="">
            <a href="<?= $url; ?>proses/proses_logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
          </li>
        <?php } ?>

        <!-- Tata Usaha -->
        <?php if ($_SESSION['user']=='Tata Usaha') { ?>
          <li class="active">
            <a href="<?= $url; ?>view/tata_usaha" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li><a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>BOS</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>view/tata_usaha/perencanaan_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana Bos</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/tata_usaha/realisasi_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Realisasi Dana BOS</a>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Laporan Rekapitulasi Dana</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>tata_usaha/laporan/bos" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana BOS</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>tata_usaha/laporan/yayasan" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana Yayasan</a>
              </li>
            </ul>
          </li> -->
          <li class="">
            <a href="<?= $url; ?>proses/proses_logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
          </li>
        <?php } ?>

        <!-- Yayasan -->
        <?php if ($_SESSION['user']=='Yayasan') { ?>
          <li class="active">
            <a href="<?= $url; ?>view/yayasan" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li>
            <a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>BOS</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>view/yayasan/perencanaan_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana Bos</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/yayasan/realisasi_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Realisasi Dana BOS</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>YAYASAN</a>
            <ul>
              <li>
                <a href="<?= $url; ?>view/yayasan/perencanaan_yayasan.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/yayasan/penerimaan_spp.php" class="waves-effect"><i class="fa fa-folder-o  m-r-10" aria-hidden="true"></i>Penerimaan SPP</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/yayasan/pengeluaran_yayasan.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Pengeluaran Dana</a>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Laporan Rekapitulasi Dana</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>yayasan/laporan/bos" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana BOS</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>yayasan/laporan/yayasan" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana Yayasan</a>
              </li>
            </ul>
          </li> -->
          <li class="">
            <a href="<?= $url; ?>proses/proses_logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
          </li>
        <?php } ?>

        <!-- Kepala Sekolah -->
        <?php if ($_SESSION['user']=='Kepala Sekolah') { ?>
          <li class="active">
            <a href="<?= $url; ?>view/kepala" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li>
            <a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>BOS</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>view/kepala/perencanaan_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana Bos</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>view/kepala/realisasi_bos.php" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Realisasi Dana BOS</a>
              </li>
            </ul>
          </li>          
          <!-- <li>
            <a href="#" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Laporan Rekapitulasi Dana</a>
            <ul>
              <li class="">
                <a href="<?= $url; ?>kepala/laporan/bos" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana BOS</a>
              </li>
              <li class="">
                <a href="<?= $url; ?>kepala/laporan/yayasan" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dana Yayasan</a>
              </li>
            </ul>
          </li> -->
          <li class="">
            <a href="<?= $url; ?>proses/proses_logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>