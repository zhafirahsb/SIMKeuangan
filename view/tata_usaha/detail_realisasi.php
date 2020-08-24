<!DOCTYPE html>
<html lang="en">
<?php require('template/head.php') ?>

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
    <?php require('template/header.php') ?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php require('template/sidebar.php') ?>

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
            <h3 class="text-themecolor m-b-0 m-t-0">Realisasi</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= $url; ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">BOS</li>
              <li class="breadcrumb-item active">Realisasi Dana BOS</li>
            </ol>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
          <div class="card-block">
            <h4><u>Pendapatan BOS</u></h4>
            <div class="form-group row mt-3">
              <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
              <div class="col-sm-10">
                <p><?= $tahun; ?></p>
              </div>
            </div>
            <!-- <input type="text" name="tahun_ajaran" class="form-control mt-3 mb-3" placeholder="Tahun Ajaran" required> -->

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Nama Program</label>
              <div class="col-sm-10">
                <?= $program[0]['nama_program']; ?>
              </div>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sub Program</th>
                  <th>No Kode</th>
                  <th>Uraian</th>
                  <th>Jumlah</th>
                  <th>Aksi Uraian</th>
                  <th>Foto</th>
                  <th>Aksi Sub Program</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $rkas = $crud->query("SELECT * FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_komponen ON bos_realisasi_komponen.id_bos_realisasi_komponen = bos_realisasi_rekapitulasi.sub_program_id WHERE bos_realisasi_rekapitulasi.idsnp = '" . $standar . "' AND bos_realisasi_rekapitulasi.tahun_ajaran = '" . $tahun . "'");
                $jumlah = 0;
                $no_sub = 0;
                foreach ($rkas as $rk) {
                  $detail_rkas = $crud->read_data('bos_realisasi_detail_komponen', ['relasi_id' => $rk['id_bos_realisasi_rekapitulasi']]);
                  // print_r(count($detail_rkas));
                  // die;
                  if (count($detail_rkas) > 0) {
                    $no = 0;
                    $jdetail = 0;
                    foreach ($detail_rkas as $rk2) {
                      $jdetail += $rk2['jumlah'];
                ?>
                      <tr>
                        <?php
                        if ($no == 0) {
                        ?>
                          <td rowspan="<?= count($detail_rkas); ?>"><?= $rk['nama_program']; ?></td>
                        <?php
                        }
                        ?>
                        <td><?= $rk2['no_kode'] ?></td>
                        <td><?= $rk2['uraian'] ?></td>
                        <td><?= number_format($rk2['jumlah'], 0, ',', '.'); ?></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#exampleModal<?= $no_sub . $no; ?>" class="btn btn-default">Ubah</a>
                          <?php
                          if ($no > 0) {
                          ?>
                            <a href="hapus_detail.php?detail=<?= $rk2['id_bos_realisasi_detail_komponen']; ?>&tahun=<?= $tahun ?>&standar=<?= $standar; ?>" class="btn btn-default" onclick="return confirm('Akan menghapus data ini ?')">Hapus</a>
                          <?php
                          }
                          ?>
                          <div class="modal fade" id="exampleModal<?= $no_sub . $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <!-- <form action="<?= $url; ?>tata_usaha/perencanaan_bos/ubah_detail_perencanaan.php" method="post"> -->
                              <form action="<?= $url; ?>tata_usaha/realisasi/ubah_detail_perencanaan.php" method="post">
                                <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                                <input type="hidden" name="standar" value="<?= $standar; ?>">
                                <input type="hidden" name="detailrencana" value="<?= $rk2['id_bos_realisasi_detail_komponen'] ?>">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="">Ubah Urain Ini</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">No Kode</label>
                                      <input type="text" class="form-control" name="nokode" value="<?= $rk2['no_kode'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Uraian</label>
                                      <input type="text" class="form-control" name="sub" value="<?= $rk2['uraian'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Jumlah</label>
                                      <input type="number" name="jumlah" class="form-control" value="<?= $rk2['jumlah'] ?>" required>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </td>
                        <td><img src="<?= $url; ?>assets/uploads/<?= $rk2['foto'] ?>" width="100px" alt=""></td>
                        <?php
                        if ($no == 0) {
                        ?>
                          <td rowspan="<?= count($detail_rkas); ?>">
                            <a href="#" data-toggle="modal" data-target="#subprogram<?= $no_sub . $no; ?>" class="btn btn-default">Ubah</a>
                            <a href="hapus_sub.php?detail=<?= $rk['id_bos_realisasi_rekapitulasi']; ?>&tahun=<?= $tahun ?>&standar=<?= $standar; ?>" class="btn btn-default" onclick="return confirm('Akan menghapus data ini ?')">Hapus</a>
                          </td>
                          <div class="modal fade" id="subprogram<?= $no_sub . $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <form action="<?= $url; ?>tata_usaha/realisasi/ubah_rencana_sub.php" method="post">
                                <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                                <input type="hidden" name="standar" value="<?= $standar; ?>">
                                <input type="hidden" name="rencana" value="<?= $rk['id_bos_realisasi_rekapitulasi']; ?>">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Sub Program</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">Sub Program</label>
                                      <select name="subprogram" class="form-control" id="">
                                        <?php
                                        foreach ($realisasi_komponen as $rkm) {

                                        ?>
                                          <option value="<?= $rkm['id_bos_realisasi_komponen']; ?>" <?= $rkm['id_bos_realisasi_komponen'] == $rk['sub_program_id'] ? 'selected' : ''; ?>><?= $rkm['nama_program']; ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                      <!-- <input type="text" name="subprogram" class="form-control" value="<?= $rk['nama_program']; ?>" required> -->
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                    <tr>
                      <th colspan="3">Total Sub</th>
                      <td><?= number_format($jdetail, 0, ',', '.'); ?></td>
                      <td></td>
                      <td></td>
                    </tr>
                <?php
                    $jumlah += $jdetail;
                  }
                  $no_sub++;
                }
                ?>
                <tr>
                  <th colspan="3">Total Program</th>
                  <td><?= number_format($jumlah, 0, ',', '.'); ?></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <a href="<?= $url; ?>tata_usaha/realisasi" class="btn btn-default">Kembali</a>
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