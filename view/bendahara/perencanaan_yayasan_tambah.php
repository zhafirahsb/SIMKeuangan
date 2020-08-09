<?php
session_start();
require('../../url.php');
require('../../proses/yayasan.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
$biaya = get_jenis_biaya();
$satuan = ['siswa', 'orang', 'jam'];
$volume = ['bulan', 'tahun', 'kali'];
// get_pegawai_json();
// echo json_encode($bantuan);
// tambah_rencana_pengeluaran_yys();
if (isset($_POST['submit'])) {
  tambah_rencana_pengeluaran_yys();
}
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
    <?php
    // if (isset($_POST['submit'])) {
    //   tambah_rencana_pengeluaran_yys();
    // }
    ?>
    <!-- Start Page Content -->
    <div class="card">
      <div class="card-block">
        <h4>Tambah Rencana Pengeluaran Dana Yayasan</h4>
        <form action="" method="post">
          <input type="hidden" name="tahun" class="form-control" id="tahun" value="<?= $_GET['tahun'] ?>">
          <div class="form-group row mt-3">
            <label class="col-sm-3 col-form-label">Jenis Biaya</label>
            <div class="col-sm-9">
              <select name="jenis" id="jenis" class="form-control" onchange="pilihjenis()" required>
                <option value="">~ Pilih Biaya ~</option>
                <?php $no = 0;
                foreach ($biaya as $b) { ?>
                  <option value="<?= $no ?>"><?= $b['jenis_biaya'] ?></option>
                <?php $no++;
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group row mt-3" id="sub_jenis">
            <label class="col-sm-3 col-form-label">Sub Jenis Biaya</label>
            <div class="col-sm-9">
              <select name="sub_jenis" id="pilih_sub_jenis" class="form-control">
                <option value="">~ Pilih Biaya ~</option>
              </select>
            </div>
          </div>
          <div class="form-group row mt-3" id="masa_kerja">
            <label class="col-sm-3 col-form-label">Masa Kerja</label>
            <div class="col-sm-9">
              <select name="masa_kerja" id="pilih_masa_kerja" class="form-control">
                <option value="">~ Pilih Masa Kerja ~</option>
              </select>
            </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr class="text-center">
                <td>Detail Uraian</td>
                <td colspan="2" width="20%">Satuan</td>
                <td colspan="2" width="20%">Volume</td>
                <td>Jumlah</td>
                <td>Total</td>
              </tr>
            </thead>
            <tbody id="datanya">
              <tr>
                <td>
                  <select name="detail_uraian[]" id="detail_uraian" class="form-control" required>
                    <option value="">~ Pilih Biaya ~</option>
                  </select>
                </td>
                <td><input type="number" name="jumlah_satuan[]" class="form-control" id="jumlah_satuan" onkeyup="hitung()"></td>
                <td>
                  <select name="satuan[]" id="satuan[]" class="form-control">
                    <?php for ($i = 0; $i <= count($satuan) - 1; $i++) { ?>
                      <option value="<?= $satuan[$i] ?>"><?= $satuan[$i] ?></option>
                    <?php } ?>
                  </select></td>
                <td><input type="number" name="jumlah_volume[]" class="form-control" id="jumlah_volume" onkeyup="hitung()"></td>
                <td>
                  <select name="volume[]" id="volume[]" class="form-control">
                    <?php for ($i = 0; $i <= count($volume) - 1; $i++) { ?>
                      <option value="<?= $volume[$i] ?>"><?= $volume[$i] ?></option>
                    <?php } ?>
                  </select></td>
                <td><input type="number" name="jumlah[]" class="form-control" id="jumlah" onkeyup="hitung()"></td>
                <td><input type="number" name="total[]" class="form-control" id="total" onkeyup="hitung()"></td>
              </tr>
            </tbody>
          </table>

          <button class="btn btn-success" type="submit" id="submit" name="submit">Simpan</button>
          <!-- <input type="submit" name="submit" value="Submit" class="btn btn-success"> -->
          <a href="<?= $url; ?>view/bendahara/perencanaan_yayasan.php" class="btn btn-secondary">Batal</a>
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
<script src="<?= $url ?>view/_template/tambah_rencana_yayasan.js"></script>