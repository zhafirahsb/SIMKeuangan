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
            <h3 class="text-themecolor m-b-0 m-t-0">Perencaaan Dana BOS</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Perencaaan Dana BOS</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <p>Rencana Pemasukan</p>
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
                ?>
                <form action="<?= $url; ?>tata_usaha/perencanaan_bos/rencana.php" method="post">
                  <div class="row">
                    <div class="col-2">
                      <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control" id="" required>
                          <?php
                          for ($i = 2017; $i <= date('Y'); $i++) {
                          ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label for="">Jumlah Siswa</label>
                        <input type="number" name="jumlah" class="form-control">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Dana Per Siswa</label>
                        <input type="number" name="dana" class="form-control">
                      </div>
                    </div>
                    <!-- <div class="col-3">
                      <div class="form-group">
                        <label for="">Saldo Tahun Lalu</label>
                        <input type="number" name="saldo" class="form-control">
                      </div>
                    </div> -->
                    <div class="col-2 align-self-center">
                      <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                      </div>
                    </div>
                  </div>
                </form>
                <table class="table table-bordered" style="font-size:14px;">
                  <thead>
                    <tr>
                      <th>Tahun Ajaran</th>
                      <th>Jumlah Siswa</th>
                      <th>Dana Persiswa</th>
                      <th>Total Dana</th>
                      <th>Saldo Tahun Lalu</th>
                      <th>Jumlah Penerimaan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    $saldo_sebelum = 0;
                    foreach ($rkas_rencana as $rr) {
                    ?>
                      <tr>
                        <td><?= $rr['tahun']; ?></td>
                        <td><?= $rr['jumlah_siswa']; ?></td>
                        <td><?= number_format($rr['dana_siswa'], 0, '.', '.'); ?></td>
                        <td><?= number_format($rr['total'], 0, ',', '.'); ?></td>
                        <!-- <td><?= number_format($saldo_sebelum, 0, '.', '.'); ?></td> -->
                        <td></td>
                        <td><?= number_format($rr['total'] + $saldo_sebelum, 0, ',', '.'); ?></td>
                        <td>
                          <!-- <a href="#" data-toggle="modal" data-target="#exampleModal<?= $no; ?>" class="btn btn-default">Ubah</a> -->
                          <a href="hapus_rencana.php?rencana=<?= $rr['id_bos_rkas_rencana']; ?>&tahun=<?= $rr['tahun']; ?>" class="btn btn-danger" onclick="return confirm('Akan menghapus data ini ?')">Hapus</a>
                        </td>
                      </tr>
                      <div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="<?= $url; ?>tata_usaha/perencanaan_bos/ubah_rencana.php" method="post">
                            <input type="hidden" name="rencana" value="<?= $rr['id_bos_rkas_rencana'] ?>">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="">Tahun Ajaran</label>
                                  <select name="tahun" class="form-control" id="" required>
                                    <?php
                                    for ($i = 2017; $i <= date('Y'); $i++) {
                                    ?>
                                      <option value="<?= $i; ?>" <?= $i == $rr['tahun'] ? 'selected' : ''; ?>><?= $i; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Jumlah Siswa</label>
                                  <input type="number" name="jumlah" class="form-control" value="<?= $rr['jumlah_siswa']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Dana Per Siswa</label>
                                  <input type="number" name="dana" value="<?= $rr['dana_siswa']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Saldo Tahun Lalu</label>
                                  <input type="number" name="saldo" value="<?= $rr['saldo_tahun_lalu']; ?>" class="form-control">
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
                      $no++;
                      $saldo_sebelum += $rr['total'];
                    }
                    ?>
                    <?php
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <!-- <a class="btn btn-default mb-5"></a> -->
                <form action="" method="post">
                  <div class="row mb-5">
                    <div class="col-3 align-self-center">
                      <select name="tahun_ajaran" class="form-control" id="" required>
                        <option value="">Pilih Tahun</option>
                        <?php
                        for ($a = 2017; $a <= date('Y'); $a++) {
                        ?>
                          <option value="<?= $a; ?>"><?= $a; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-1 align-self-center">
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                    <div class="col-2 align-self-center">
                      <a href="tambah.php" class="btn btn-info">Tambah Data</a>
                    </div>
                  </div>
                </form>
                <?php
                if (isset($_SESSION['notice1'])) {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['notice1']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                  unset($_SESSION['notice1']);
                }
                if (@count($rkas_rencana1) > 0) {
                  // foreach ($rkas_rencana as $rr) {
                ?>
                  <p>Rencana Pengeluaran / Belanja</p>
                  <p>Tahun Ajaran <?= $rkas_rencana1[0]['tahun']; ?></p>
                  <table class="table table-bordered mt-3" id="">
                    <thead>
                      <th>Kode</th>
                      <th>Nama Program</th>
                      <th>Persentase</th>
                      <th>Jumlah</th>
                      <!-- <th>Persentase Rencana Dana Digunakan</th> -->
                      <th>Rencana Dana Digunakan</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $standar = $crud->query("SELECT * FROM tbl_persentase_standar_nasional JOIN tbl_standar_nasional ON tbl_standar_nasional.idsnp = tbl_persentase_standar_nasional.npsn WHERE tahun_ajaran = '" . $rkas_rencana1[0]['tahun'] . "'");
                      $jumlah = 0;
                      $jumlah1 = 0;
                      $persentase = 0;
                      foreach ($standar as $st) {
                        $dana_rencana = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $rkas_rencana1[0]['tahun'] . "'");
                        $dana = ($st['persentase'] / 100) * ($rkas_rencana1[0]['total'] + $rkas_rencana1[0]['saldo_tahun_lalu']);

                        $persentase += $st['persentase'];
                        $jumlah += $dana;
                        $jumlah1 += $dana_rencana[0]['jumlah'];
                      ?>
                        <tr>
                          <td>1.<?= $no; ?></td>
                          <td><?= $st['nama_program']; ?></td>
                          <td><?= $st['persentase']; ?>%</td>
                          <td>Rp.<?= number_format($dana, 0, '.', '.'); ?></td>
                          <!-- <td><?= round(($dana_rencana[0]['jumlah'] / ($rkas_rencana1[0]['total'] + $rkas_rencana1[0]['saldo_tahun_lalu'])) * 100, 2); ?>%</td> -->
                          <td>Rp.<?= number_format($dana_rencana[0]['jumlah'], 0, '.', '.'); ?></td>
                          <td>
                            <a href="detail_perencanaan.php?tahun=<?= $rkas_rencana1[0]['tahun']; ?>&standar=<?= $st['idsnp']; ?>" class="btn btn-default">Detail</a>
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#komponen<?= $no; ?>">Ubah</a>
                          </td>
                        </tr>
                        <div class="modal fade" id="komponen<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form action="<?= $url; ?>tata_usaha/perencanaan_bos/ubah_persentase.php" method="post">
                              <input type="hidden" name="id" value="<?= $st['id_persentase_standar_nasional']; ?>">
                              <input type="hidden" name="tahun" value="<?= $rkas_rencana1[0]['tahun']; ?>">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Persentase Program</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="">Nama Program</label>
                                    <input type="text" readonly name="program" class="form-control" value="<?= $st['nama_program']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Persentase</label>
                                    <input type="text" name="persentase" class="form-control" value="<?= $st['persentase']; ?>">

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
                        $no++;
                      }
                      ?>
                      <tr>
                        <th colspan="2">Total</th>
                        <td><?= $persentase; ?>%</td>
                        <td><?= number_format($jumlah, 0, '.', '.');  ?></td>
                        <td><?= number_format($jumlah1, 0, '.', '.');  ?></td>
                      </tr>
                    </tbody>
                  </table>
                <?php
                } else {
                ?>
                  <p>Tidak Ada Data !</p>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require('template/footer.php') ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>

  <?php require('template/jquery.php') ?>

</body>

</html>