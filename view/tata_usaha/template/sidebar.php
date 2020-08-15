<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="active">
          <a href="<?= $url; ?>tata_usaha" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Dashboard</a>
        </li>
        <li>
          <a href="#" class="waves-effect"><i class="fa fa-folder m-r-10" aria-hidden="true"></i>BOS</a>
          <ul>
            <li class="">
              <a href="<?= $url; ?>tata_usaha/perencanaan_bos" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Perencanaan Dana Bos</a>
            </li>
            <li class="">
              <a href="<?= $url; ?>tata_usaha/realisasi" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Realisasi Dana BOS</a>
            </li>
            <li class="">
              <a href="<?= $url; ?>tata_usaha/model" class="waves-effect"><i class="fa fa-folder-o m-r-10" aria-hidden="true"></i>Model</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#" class="waves-effect"><i class="fa fa-book m-r-10" aria-hidden="true"></i>Laporan Rekapitulasi Dana</a>
          <ul>
            <li class="">
              <a href="<?= $url; ?>tata_usaha/laporan/bos" class="waves-effect"><i class="fa fa-bookmark m-r-10" aria-hidden="true"></i>Dana BOS</a>
            </li>
            <li class="">
              <a href="<?= $url; ?>tata_usaha/laporan/yayasan" class="waves-effect"><i class="fa fa-bookmark m-r-10" aria-hidden="true"></i>Dana Yayasan</a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="<?= $url; ?>tata_usaha/logout.php" class="waves-effect"><i class="fa fa-power-off m-r-10" aria-hidden="true"></i>Logout</a>
        </li>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>