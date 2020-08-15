<?php
include('../function.php');
$id = $_GET['subjenis'];
$mk = $_GET['mk'];
$tahun = $_GET['tahun'];

function masa_kerja()
{
  global $mk;
  global $tahun;
  if ($mk == '0') {
    $where = "($tahun-tahun_masuk)>=0 AND ($tahun-tahun_masuk)<1";
  } else if ($mk == '1') {
    $where = "($tahun-tahun_masuk)>=1 AND ($tahun-tahun_masuk)<5";
  } else if ($mk == '2') {
    $where = "($tahun-tahun_masuk)>=5 AND ($tahun-tahun_masuk)<9";
  } else if ($mk == '3') {
    $where = "($tahun-tahun_masuk)>=9 AND ($tahun-tahun_masuk)<13";
  } else if ($mk == '4') {
    $where = "($tahun-tahun_masuk)>=13";
  }
  return $where;
}

if ($id == 4) {
  $data = [
    'Tunjangan Kasek',
    'Tunjangan Wakasek',
    'Tunjangan Wali Kelas'
  ];
  echo json_encode($data);
} else {
  $sql = "SELECT * FROM tbl_pegawai JOIN tbl_jabatan ON tbl_pegawai.jabatan_id = tbl_jabatan.id_jabatan";
  if (($id == 1) or ($id == 2)) {
    $sql .= " Where jabatan_id = '$id' AND ";
    $sql .= masa_kerja();
  } else {
    if ($id == 5) {
      $id = 4;
    }
    $sql .= " Where jabatan_id = '$id'";
  }
  //  print_r($sql);die;
  // echo json_encode( $sql);
  echo json_encode(get_data_join($sql));
}
