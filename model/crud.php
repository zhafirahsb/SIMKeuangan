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

  public function transaksi()
  {
    $query = "SELECT transaksi.id_transaksi,kode_pesanan,status_transaksi,tanggal_transaksi,nama_plgn,nama_produk,quantity_dk,harga_pdk,total FROM transaksi JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN pelanggan on pelanggan.id_plgn = transaksi.id_pelanggan JOIN produk ON produk.id_produk = detail_transaksi.id_produk";
    $hasil = $this->conn->query($query);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function transaksi_penjualan()
  {
    $query = "SELECT transaksi.id_transaksi,kode_pesanan,status_transaksi,tanggal_transaksi,nama_plgn,bukti_transfer,GROUP_CONCAT(nama_produk) as nama_produk,GROUP_CONCAT(quantity_dk) as quantity_dk,GROUP_CONCAT(harga_pdk) as harga_pdk,GROUP_CONCAT(total) as total,total_bayar FROM transaksi JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN pelanggan on pelanggan.id_plgn = transaksi.id_pelanggan JOIN produk ON produk.id_produk = detail_transaksi.id_produk GROUP BY (detail_transaksi.id_transaksi)";
    $hasil = $this->conn->query($query);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function laporan_transaksi($data)
  {
    $query = "SELECT kode_pesanan,tanggal_transaksi,nama_plgn,nama_produk,status_transaksi,quantity_dk,harga_pdk,total FROM transaksi JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN pelanggan on pelanggan.id_plgn = transaksi.id_pelanggan JOIN produk ON produk.id_produk = detail_transaksi.id_produk WHERE DATE(transaksi.tanggal_transaksi) >= '" . $data['tgl_awal'] . "' AND DATE(transaksi.tanggal_transaksi) <= '" . $data['tgl_akhir'] . "'";
    $hasil = $this->conn->query($query);
    if (!$hasil)
      return false;
    $rows = array();
    while ($row = $hasil->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function jumlah_transaksi($tanggal_transaksi)
  {
    $query = "SELECT SUM(quantity_dk) as jumlah FROM transaksi JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE MONTH(tanggal_transaksi) = MONTH('" . $tanggal_transaksi . "') AND YEAR(tanggal_transaksi) = YEAR('" . $tanggal_transaksi . "')";
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
