<!DOCTYPE html>
<html lang="en">
<?php require('../../../view/tata_usaha/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">
    <?php require('../../../view/tata_usaha/template/header.php') ?>
    <?php require('../../../view/tata_usaha/template/sidebar.php') ?>
    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Dana Yayasan</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4><u>Perencanaan Pemasukan Dana Yayasan</u></h4>
            <form action="" method="POST">
              <div class="row">
                <div class="col-2 align-self-center">
                  <h5>Pilih Tahun</h5>
                </div>
                <div class="col-2">
                  <select name="tahun" class="form-control">
                    <?php
                    for ($i = 2017; $i <= date('Y'); $i++) {
                    ?>
                      <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <input type="hidden" name="tipe" value="rencana_pemasukan">
                <div class="col-1">
                  <input type="submit" class="btn btn-primary" name="submit" value="Lihat">
                </div>
                <div class="col-1">
                  <button type="submit" name="pdf" class="btn btn-primary">Cetak Ke PDF</button>
                </div>
              </div>
            </form>
            <h4 class="mt-4 text-center">Rencana Anggaran Pendapatan SMP Muhammadiyah 19 T.A. <?= @$tahun; ?></h4>
            <table class="table table-bordered mt-3">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <!-- <th>Tahun</th> -->
                  <th>Keterangan</th>
                  <th colspan="7">Uraian</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (@$pendapatan) {
                  $no = 0;
                  $jumlah_pendapatan = 0;
                  foreach ($pendapatan as $p) {
                    $jumlah_pendapatan += $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12;
                ?>
                    <tr>
                      <td><?= $no + 1; ?></td>
                      <!-- <td><?= $p['tahun']; ?></td> -->
                      <td><?= $p['keterangan']; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] : ''; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? 'sis' : ''; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? '12' : ''; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                      <td><?= $p['jumlah_siswa'] > 0 ? 'bln' : ''; ?></td>
                      <td>Rp. <?= number_format($p['jumlah_iuran'], 0, ',', '.'); ?></td>
                      <td>Rp. <?= number_format($p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12 : $p['jumlah_iuran'], 0, ',', '.'); ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <!-- <td><?= $p['tahun']; ?></td> -->
                    <th>Uang Iuran Sekolah Kelas VII - IX</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Rp. <?= number_format($jumlah_pendapatan, 0, ',', '.'); ?></th>
                    <td></td>
                  </tr>
                <?php
                } else {
                ?>
                  <tr>
                    <td colspan="5" class="text-center">
                      Belum Ada data
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4 class="mb-3"><u>Perencanaan Pengeluaran Dana Yayasan</u></h4>
            <form action="" method="POST" class="mb-3">
              <div class="row">
                <div class="col-2 align-self-center">
                  <h5>Pilih Tahun</h5>
                </div>
                <div class="col-2">
                  <select name="tahun" class="form-control">
                    <?php
                    for ($i = 2017; $i <= date('Y'); $i++) {
                    ?>
                      <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <input type="hidden" name="tipe" value="rencana_pengeluaran">
                <div class="col-1">
                  <input type="submit" class="btn btn-primary" name="submit" value="Lihat">
                </div>
                <div class="col-1">
                  <button type="submit" name="pdf" class="btn btn-primary">Cetak Ke PDF</button>
                </div>
              </div>
            </form>
            <h4 class="text-center mb-3">Rencana Pengeluaran SMP Muhammadiyah 19 T.A. <?= @$tahun1; ?></h4>
            <table class="table table-bordered mt-3" id="example">
              <thead>
                <tr class="text-center">
                  <th>Kode</th>
                  <th>Uraian</th>
                  <th>Satuan</th>
                  <th>Volume</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($rencana) {
                  $jenis_biaya = get_jenis_biaya();
                  $i = 1;
                  foreach ($jenis_biaya as $jb) {
                ?>
                    <tr>
                      <th><?= $i ?></th>
                      <th><?= $jb['jenis_biaya'] ?></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <?php
                    if ($jb['jenis_biaya'] == 'Biaya Bantuan') {
                      $uraian = get_uraian_rencana(['jenis_biaya' => 'Biaya Bantuan', 'tahun' => $tahun1]);
                      if ($uraian) {
                        $j = 1;
                        foreach ($uraian as $u) {
                    ?>
                          <tr>
                            <th><?= $i . ' . ' . $j ?></th>
                            <td><?= $u['uraian'] ?></td>
                            <td><?= $u['nilai_satuan'] . ' ' . $u['satuan'] ?></td>
                            <td><?= $u['nilai_volume'] . ' ' . $u['volume'] ?></td>
                            <td><?= 'Rp ' . $u['jumlah'] ?></td>
                            <td><?= 'Rp ' . $u['total'] ?></td>
                          </tr>
                        <?php
                          $j++;
                        }
                      }
                    } else {
                      $sub_jenis_biaya = get_sub_jenis_biaya(['jenis_biaya' => $jb['jenis_biaya']]);
                      $j = 1;
                      foreach ($sub_jenis_biaya as $sjb) {
                        ?>
                        <tr>
                          <th><?= $i . ' . ' . $j ?></th>
                          <th><?= $sjb['sub_jenis_biaya'] ?></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                        <?php
                        if ($sjb['id_yayasan_rencana_pengeluaran'] > 2) {
                          $uraian = get_uraian_rencana(['sub_jenis_biaya' => $sjb['sub_jenis_biaya'], 'tahun' => $tahun1]);
                          if ($uraian) {
                            $k = 1;
                            foreach ($uraian as $u) {
                        ?>
                              <tr>
                                <th><?= $i . ' . ' . $j . ' . ' . $k ?></th>
                                <td><?= $k . '. ' . $u['uraian'] ?></td>
                                <td><?= $u['nilai_satuan'] . ' ' . $u['satuan'] ?></td>
                                <td><?= $u['nilai_volume'] . ' ' . $u['volume'] ?></td>
                                <td><?= 'Rp ' . $u['jumlah'] ?></td>
                                <td><?= 'Rp ' . $u['total'] ?></td>
                              </tr>
                            <?php
                              $k++;
                            }
                          }
                        } else {
                          $masa_kerja = get_masa_kerja();
                          $k = 1;
                          foreach ($masa_kerja as $mk) {
                            $data_uraian = ['sub_jenis_biaya' => $sjb['sub_jenis_biaya'], 'tahun' => $tahun1, 'masa_kerja' => $mk];
                            ?>
                            <tr>
                              <th><?= $i . ' . ' . $j . ' . ' . $k ?></th>
                              <th><?= $mk ?></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                            <?php
                            // $uraian = get_uraian_rencana($data_uraian);
                            $uraian = $crud->query("SELECT * FROM yayasan_rencana_pengeluaran LEFT JOIN yayasan_detail_rencana_pengeluaran ON yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran=yayasan_detail_rencana_pengeluaran.id_rencana_pengeluaran WHERE yayasan_rencana_pengeluaran.sub_jenis_biaya = '" . $sjb['sub_jenis_biaya'] . "' AND yayasan_detail_rencana_pengeluaran.tahun = '" . $tahun1 . "' AND masa_kerja = '" . $mk . "'");
                            $l = 1;
                            foreach ($uraian as $u) {
                              // var_dump($u);
                            ?>
                              <tr>
                                <?php if ($sjb['sub_jenis_biaya'] == "") {
                                  echo "<td>$i . $j</td>";
                                } else { ?>
                                  <td><?= $i . ' . ' . $j . ' . ' . $k . ' . ' . $l ?></td>
                                <?php }  ?>
                                <td><?= $l . '. ' . $u['uraian'] ?></td>
                                <td><?= $u['nilai_satuan'] . ' ' . $u['satuan'] ?></td>
                                <td><?= $u['nilai_volume'] . ' ' . $u['volume'] ?></td>
                                <td><?= 'Rp ' . $u['jumlah'] ?></td>
                                <td><?= 'Rp ' . $u['total'] ?></td>
                              </tr>
                  <?php
                              $l++;
                            }
                            $k++;
                          }
                        }
                        $j++;
                      }
                    }
                    $i++;
                  }
                } else {
                  ?>
                  <tr class="text-center">
                    <td colspan="7">Belum Ada Data</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-block">
            <h4>Realisasi Dana Yayasan</h4>
            <form action="" method="POST" class="mb-3">
              <div class="row">
                <div class="col-2 align-self-center">
                  <h5>Pilih Tahun</h5>
                </div>
                <div class="col-2">
                  <select name="tahun" class="form-control">
                    <?php
                    for ($i = 2017; $i <= date('Y'); $i++) {
                    ?>
                      <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-2">
                  <select name="bulan" class="form-control" required>
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <input type="hidden" name="tipe" value="realisasi">
                <div class="col-1">
                  <input type="submit" class="btn btn-primary" name="submit" value="Lihat">
                </div>
                <div class="col-1">
                  <button type="submit" name="pdf" class="btn btn-primary">Cetak Ke PDF</button>
                </div>
              </div>
            </form>
            <?php
            if (@$spp || @$pengeluaran) {
            ?>
              <h4 class="text-center">Laporan Keuangan SMP Muhammadiyah 19 <br>Bulan : <?= @tanggal_indonesia($bulan2); ?><br>Tahun <?= @$tahun2; ?></h4>
              <div class="row">
                <div class="col-6">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tgl</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tspp = 0;
                      $nospp = 1;
                      // foreach ($spp as $sp) {
                      for ($i = 0; $i < $baris; $i++) {
                      ?>
                        <tr>
                          <td><?= @$spp[$i] ? $nospp : '&nbsp;'; ?></td>
                          <td><?= @$spp[$i] ? date('d', strtotime($spp[$i]['tanggal'])) : ''; ?></td>
                          <td><?= @$spp[$i]['uraian']; ?></td>
                          <td><?= @$spp[$i] ? 'Rp.' . number_format(@$spp[$i]['total'], 0, ',', '.') : ''; ?></td>
                        </tr>
                      <?php
                        $tspp += @$spp[$i] ? $spp[$i]['total'] : 0;
                        $nospp++;
                      }
                      ?>
                      <tr>
                        <th colspan="3">Total</th>
                        <td>Rp.<?= number_format($tspp, 0, ',', '.') ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-6">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tgl</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tpengeluaran = 0;
                      $nopengeluaran = 1;
                      for ($i = 0; $i < $baris; $i++) {
                        // foreach ($pengeluaran as $pe) {
                      ?>
                        <tr>
                          <td><?= (@$pengeluaran[$i] ? $nopengeluaran : '&nbsp;'); ?></td>
                          <td><?= (@$pengeluaran ? date('d', strtotime($pengeluaran[$i]['tanggal'])) : ''); ?></td>
                          <td><?= @$pengeluaran[$i]['uraian']; ?></td>
                          <td> <?= (@$pengeluaran[$i] ? 'Rp.' . number_format(@$pengeluaran[$i]['jumlah'], 0, ',', '.') : ''); ?>
                        </tr>
                      <?php
                        $tpengeluaran += @$pengeluaran[$i] ? $pengeluaran[$i]['jumlah'] : 0;
                        $nopengeluaran++;
                      }
                      ?>
                      <tr>
                        <th colspan="3">Total</th>
                        <td>Rp.<?= number_format($tpengeluaran, 0, ',', '.') ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php
            } else {
            ?>
              <h6 class="mt-5 text-center">Belum ada data !</h6>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <?php require('../../../view/tata_usaha/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../../view/tata_usaha/template/jquery.php') ?>
</body>

</html>