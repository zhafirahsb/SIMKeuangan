<?php
include('function.php');
//===============================================================
//                        TAMPIL DATA
//===============================================================
// menampilkan data Rencana Pendapatan Yayasan
function get_rencana_pendapatan_yys()
{
  $table = "yayasan_rencana_pendapatan";
  return get_data($table);
}

// menampilkan data Rencana Pengeluaran Yayasan
function get_rencana_pengeluaran_yys()
{
  $table = "yayasan_rencana_pengeluaran";
  return get_data($table);
}
              
// menampilkan data realisasi penerimaan SPP
function get_penerimaan_spp($id = null)
{
  $table = "yayasan_penerimaan_spp";
  if ($id) {
    $data = [
      'id_yayasan_penerimaan_spp'=> $id
    ];
    return get_data($table,$data);
  }
  return get_data($table);
}
              
// menampilkan data Realisasi Pengeluaran Yayasan
function get_pengeluaran_yys()
{
  $table = "yayasan_realisasi_pengeluaran";
  return get_data($table);
}

// tampil data jenis biaya
function get_jenis_biaya()
{
  $sql = "SELECT DISTINCT(jenis_biaya) FROM yayasan_rencana_pengeluaran";
  return get_data_join($sql);
}

// tampil data sub jenis biaya
function get_sub_jenis_biaya($data=null)
{
  $sql = "SELECT * FROM yayasan_rencana_pengeluaran";

  return get_data_join($sql,$data);
}

// tampil data uraian rencana
function get_uraian_rencana($data=null)
{
  $sql = "SELECT * FROM yayasan_rencana_pengeluaran 
  LEFT JOIN yayasan_detail_rencana_pengeluaran ON yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran=yayasan_detail_rencana_pengeluaran.id_rencana_pengeluaran";
  return get_data_join($sql,$data);
}

// tampil data kategori lama mengajar
function get_masa_kerja()
{
  $kategori = [
    'Masa Kerja 0 - 1 Tahun',
    'Masa Kerja 1 - 5 Tahun',
    'Masa Kerja 5 - 9 Tahun',
    'Masa Kerja 9 - 13 Tahun',
    'Masa Kerja 13 Tahun - Dst',
  ];
  
  return $kategori;
}

function get_detail_rencana_pengeluaran($data = null)
{
  $table = "yayasan_detail_rencana_pengeluaran";
  
    return get_data($table,$data);
  
}

function get_pegawai_json($data= null){
  $table = "tbl_pegawai";
  $result = get_data($table,$data);
  echo json_encode($result);
}
//===============================================================
//                        TAMBAH DATA
//===============================================================


function tambah_rencana_pengeluaran_yys()
{
  include('../../url.php');
  $jenis = $_POST['jenis'];
  $detail_uraian = $_POST['detail_uraian'];
  $jumlah_satuan = $_POST['jumlah_satuan'];
  $satuan = $_POST['satuan'];
  $jumlah_volume = $_POST['jumlah_volume'];
  $volume = $_POST['volume'];
  $jumlah = $_POST['jumlah'];
  $total = $_POST['total'];
  if ($jenis == '0') {
    $data = array();
    $no=0;
    foreach ($detail_uraian as $du) {
      $data = array(
        'id_rencana_pengeluaran'=>$_POST['sub_jenis'],
        'tahun' => $_POST['tahun'],
        'masa_kerja' => get_masa_kerja()[$_POST['masa_kerja']],
        'uraian' => $detail_uraian[$no],
        'nilai_satuan' => $jumlah_satuan[$no],
        'satuan' => $satuan[$no],
        'nilai_volume' => $jumlah_volume[$no],
        'volume' => $volume[$no],
        'jumlah' => $jumlah[$no],
        'total' => $total[$no]
      );
      // var_dump($data);die;
      simpan_data('yayasan_detail_rencana_pengeluaran', $data);
      $no++;
    }
  } else if($jenis=='1'){
    $jenis = "Biaya Bantuan";
    $sql = "SELECT id_yayasan_rencana_pengeluaran FROM yayasan_rencana_pengeluaran where jenis_biaya ='$jenis'";
    $id = get_data_join($sql);
    $data = array();
    $no=0;
    foreach ($detail_uraian as $du) {
      $data = array(
        'id_rencana_pengeluaran'=>$id[0]['id_yayasan_rencana_pengeluaran'],
        'tahun' => $_POST['tahun'],
        'uraian' => $detail_uraian[$no],
        'nilai_satuan' => $jumlah_satuan[$no],
        'satuan' => $satuan[$no],
        'nilai_volume' => $jumlah_volume[$no],
        'volume' => $volume[$no],
        'jumlah' => $jumlah[$no],
        'total' => $total[$no]
      );
      simpan_data('yayasan_detail_rencana_pengeluaran', $data);
      $no++;
    }
  }
}

function tambah_penerimaan_spp()
{
  include('../url.php');
  if (isset($_POST['submit'])) {
    $data = array(
      'uraian' => $_POST['uraian'],
      'total' => $_POST['total'],
      'tanggal' => $_POST['tanggal'],
      'dibuat_tanggal' => date('Y-m-d H:i:s'),
      'id_user' => $_SESSION['id']
    );
    // var_dump($data);die;
    return simpan_data('yayasan_penerimaan_spp', $data);
  }
}

//===============================================================
//                        UBAH DATA
//===============================================================

function ubah_penerimaan_spp()
{
  include('../url.php');
  include('koneksi.php');
    if (isset($_POST['submit'])) {
      // var_dump($_POST); die;
      $id = $_POST['idspp'];
      $uraian =$_POST['uraian'];
      $total = $_POST['total'];
      $tanggal = $_POST['tanggal'];
      $id_user = $_SESSION['id'];
      
      if (empty($id)) {
        echo "id harus diisi";
      } else if (empty($uraian)) {
        echo "uraian harus diisi";
      } else if (empty($total)) {
        echo "total barang harus diisi";
      } else if (empty($tanggal)) {
        echo "tanggal harus diisi";
      } else {
            $query = "UPDATE yayasan_penerimaan_spp SET uraian='$uraian',total='$total' ,tanggal='$tanggal',id_user='$id_user' WHERE id_yayasan_penerimaan_spp='$id'";
            $result = mysqli_query($conn, $query);
            header("location:index.php");
        }
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM yayasan_penerimaan_spp WHERE id_yayasan_penerimaan_spp='$id'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result);
    } else {
    header('location:' . $url . 'view/bendahara/penerimaan_spp.php');
    }
}
