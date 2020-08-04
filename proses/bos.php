<?php
include('function.php');

// menampilkan data standar nasional
function get_standar_nasional()
{
  $table = "tbl_standar_nasional";
  return get_data($table);
}
// menampilkan data RKAS Rencana
function get_rkas_rencana()
{
  $table = "bos_rkas_rencana";
  return get_data($table);
}
// menampilkan data pendapatan belanja
function get_pendapatan_belanja()
{
  $sql = "SELECT * FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas LEFT JOIN tbl_standar_nasional ON bos_rkas.npsn = tbl_standar_nasional.idsnp";
  return get_data_join($sql);
}

// menampilkan data realisasi pendapatan
function get_realisasi_pendapatan($id=null)
{
  $table = "bos_realisasi_pendapatan";
  
  if ($id) {
    $data = [
      'id_bos_realisasi_pendapatan'=> $id
    ];
    return get_data($table,$data);
  }
  return get_data($table);
}

// menampilkan data realisasi_pengeluaran
function get_realisasi_pengeluaran_bos()
{
  $sql = "SELECT bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi id_relasi,bos_realisasi_detail_komponen.* FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi = bos_realisasi_detail_komponen.id_bos_realisasi_detail_komponen";
  return get_data_join($sql);
}

function report_realisasi()
{
  $sql = "SELECT * FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id = bos_rkas_detail.bos_rkas LEFT JOIN tbl_standar_nasional ON bos_rkas.npsn = tbl_standar_nasional.idsnp";
  return get_data_join($sql);
}

//menambah realisasi data pendapatan dana bos
function tambah_rencana_pendapatan_bos(){
  $table = 'bos_rkas_rencana';
  $data = [
    'tahun' => $_POST['tahun'],
    'jumlah_siswa' => $_POST['jumlah'],
    'dana_siswa' => $_POST['dana'],
    'tanggal_dibuat' => date('Y-m-d H:i:s')
  ];
  return simpan_data($table, $data);
}
function rencana_pendapatan_bos(){
  $data = array(
    'tahun_ajaran' => $_POST['tahun_ajaran'],
    'tipe' => $_POST['tipe'],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );

  $id = simpan_data('bos_rkas', $data, true);

  $detail = array(
    'bos_rkas' => $id,
    'jumlah' => $_POST['jumlah'],
  );
  simpan_data('bos_rkas_detail', $detail);
}
function tambah_rencana_belanja_bos(){
  $tahun_ajaran = $_POST['tahun_ajaran'];
  $nama_program = $_POST['nama_program'];
  $sub_program = $_POST['sub_program'];
  $tipe = $_POST['tipe'];
  $data = array(
    'tahun_ajaran' => $tahun_ajaran,
    'npsn' => $nama_program,
    'sub_program' => $sub_program,
    'tipe' => $tipe,
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );
  $id = simpan_data('bos_rkas', $data, true);
  $no_kode = $_POST['no_kode'];
  $uraian = $_POST['uraian'];
  $jumlah = $_POST['jumlah'];
  $no = 0;
  $detail = array();
  foreach ($uraian as $u) {
    $detail = array(
      'bos_rkas' => $id,
      'no_kode' => $no_kode[$no],
      'uraian' => $uraian[$no],
      'jumlah' => $jumlah[$no],
    );
    simpan_data('bos_rkas_detail', $detail);
    $no++;
  }
}

function tambah_realisasi_pendapatan_bos()
{
  if (isset($_POST['submit'])) {
    $table = 'bos_realisasi_pendapatan';
    $data = array(
      'tahun' => $_POST['tahun'],
      'nominal' => $_POST['jumlah_dana'],
    );
    simpan_data($table, $data);
  }
  
}

function ubah_realisasi_pendapatan_bos()
{
  include('../url.php');
  if (isset($_POST['submit'])) {

  $realisasi = array(
    "nominal='" . $_POST['jumlah_dana'] . "'",
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  $idrea = $_POST['realisasi'];

  update('bos_realisasi_pendapatan', $realisasi, 'id_bos_realisasi_pendapatan', $idrea);
    header('location:' . $url . 'view/tata_usaha');
  }
}
?>