<?php

  function cek_session(){
    if(!isset($_SESSION['login'])) {
      $_SESSION['notice'] = 'Anda Belum Login Silahkan login terlebih dahulu !';
      header('Location: http://localhost/simkeuangan/');
      exit;
    }
  }

  function get_data($table, $where = null)
  {
    require('koneksi.php');
    $query = "SELECT * FROM $table";
    if ($where != null) {
      $query .= " WHERE ";
      $isi = [];
      foreach ($where as $key => $value) array_push($isi, $key . "= '" . mysqli_real_escape_string($conn,$value) . "'");
      $query .= implode(" AND ", $isi);
    }
    $hasil = mysqli_query($conn,$query);
    // $this->conn->close();
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  function get_data_join($sql, $where = null)
  {
    require('koneksi.php');
    if ($where != null) {
      $sql .= " WHERE ";
      $isi = [];
      foreach ($where as $key => $value) array_push($isi, $key . "= '" . mysqli_real_escape_string($conn,$value) . "'");
      $sql .= implode(" AND ", $isi);
    }
    $hasil = mysqli_query($conn,$sql);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  function simpan_data($table, $data, $id_insert=false)
  {
    require('koneksi.php');
    $colomns = implode(", ", array_keys($data));
    $isi = [];
    foreach (array_values($data) as $idx => $data) {
      // if (is_string($data)) {
      //   $isi[$idx] = "'" . mysqli_real_escape_string($conn,$data) . "'";
      // } else {
      $isi[$idx] = "'" . $data . "'";
      // }
    }
    $values = implode(", ", $isi);
    $query = "INSERT INTO $table ($colomns) VALUES ($values)";
    $hasil = mysqli_query($conn,$query);
    if ($id_insert)
      $last_id = $insert_id;
    // mysqli_close();
    if ($hasil)
      if ($id_insert)
        return $last_id;
      else
        return true;
    else
      return false;
  }

  function simpan_data_banyak($tabel, $data)
  {
    require('koneksi.php');
    $colomns = implode(", ", array_keys($data[0]));
    $isi = [];
    foreach (array_values($data) as $idx => $data) {
      if (is_string($data)) {
        $isi[$idx] = "'" . mysqli_real_escape_string($conn,$data) . "'";
      } else {
        $isi[$idx] = "'" . $data . "'";
      }
    }
    $values = implode(", ", $isi);
    $query = "INSERT INTO $tabel ($colomns) VALUES ($values)";
    $hasil = mysqli_query($conn,$query);
    // mysqli_close();
    if ($hasil)
      return true;
    else
      return false;
  }

  function update($tabel, $data, $id, $id_value)
  {
    require('koneksi.php');
    $query = "UPDATE $tabel SET ";
    $query .= implode(', ', $data);
    $query .= " WHERE $id = '" . $id_value . "'";
    $hasil = mysqli_query($conn,$query);
    // mysqli_close();
    if ($hasil)
      return true;
    else
      return false;
  }

  function delete($tabel, $id, $id_value)
  {
    require('koneksi.php');
    $query = "DELETE FROM $tabel WHERE $id = '$id_value'";
    $hasil = mysqli_query($conn,$query);
    // mysqli_close();
    if ($hasil)
      return true;
    else
      return false;
  }
?>
