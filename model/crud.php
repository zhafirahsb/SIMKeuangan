<?php
include('koneksi.php');

class Crud extends Koneksi
{
  function __construct()
  {
    parent::__construct();
  }

  public function read_data($table, $where = null)
  {
    $query = "SELECT * FROM $table";
    if ($where != null) {
      $query .= " WHERE ";
      $isi = [];
      foreach ($where as $key => $value) array_push($isi, $key . "= '" . $this->conn->real_escape_string($value) . "'");
      $query .= implode(" AND ", $isi);
    }
    $hasil = $this->conn->query($query);
    // $this->conn->close();
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function simpan($tabel, $data, $id_insert = false)
  {
    $colomns = implode(", ", array_keys($data));
    $isi = [];
    foreach (array_values($data) as $idx => $data) {
      // if (is_string($data)) {
      //   $isi[$idx] = "'" . $this->conn->real_escape_string($data) . "'";
      // } else {
      $isi[$idx] = "'" . $data . "'";
      // }
    }
    $values = implode(", ", $isi);
    $query = "INSERT INTO $tabel ($colomns) VALUES ($values)";
    $hasil = $this->conn->query($query);
    if ($id_insert)
      $last_id = $this->conn->insert_id;
    // $this->conn->close();
    if ($hasil)
      if ($id_insert)
        return $last_id;
      else
        return true;
    else
      return false;
  }

  public function simpan_banyak($tabel, $data)
  {
    $colomns = implode(", ", array_keys($data[0]));
    $isi = [];
    foreach (array_values($data) as $idx => $data) {
      if (is_string($data)) {
        $isi[$idx] = "'" . $this->conn->real_escape_string($data) . "'";
      } else {
        $isi[$idx] = "'" . $data . "'";
      }
    }
    $values = implode(", ", $isi);
    $query = "INSERT INTO $tabel ($colomns) VALUES ($values)";
    $hasil = $this->conn->query($query);
    // $this->conn->close();
    if ($hasil)
      return true;
    else
      return false;
  }

  public function update($tabel, $data, $id, $id_value)
  {
    $query = "UPDATE $tabel SET ";
    $query .= implode(', ', $data);
    $query .= " WHERE $id = '" . $id_value . "'";
    $hasil = $this->conn->query($query);
    // $this->conn->close();
    if ($hasil)
      return true;
    else
      return false;
  }

  public function delete($tabel, $id, $id_value)
  {
    $query = "DELETE FROM $tabel WHERE $id = '$id_value'";
    $hasil = $this->conn->query($query);
    // $this->conn->close();
    if ($hasil)
      return true;
    else
      return false;
  }

  public function reliasasi_bos()
  {
    $query = "SELECT bos_realisasi_rekapitulasi.id id_relasi,bos_realisasi_detail_komponen.* FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_rekapitulasi.id = bos_realisasi_detail_komponen.relasi_id";
    $hasil = $this->conn->query($query);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function pendapatan_belanja()
  {
    $query = "SELECT * FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id = bos_rkas_detail.bos_rkas LEFT JOIN tbl_standar_nasional ON bos_rkas.npsn = tbl_standar_nasional.idsnp";
    $hasil = $this->conn->query($query);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }
}
