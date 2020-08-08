<?php

require_once('function.php');

if (isset($_POST['submit'])) {
  $table = "tbl_user";
  $data = [
    'username' => $_POST['username'],
    'password' => sha1($_POST['password'])
  ];

  if (empty($data['username']) || empty($data['password'])) {
    $_SESSION['notice'] = 'Username atau Password belum di isi !';
    header('Location:' . $url);
    exit;
  }

  $login = get_data($table, $data);
  if (!$login) {
    $_SESSION['notice'] = 'Username atau Password yang anda masukan salah !';
    header('Location:' . $url);
    exit;
  } else {
    $_SESSION['login'] = [true, $login[0]['id_user']];
    $_SESSION['id'] = $login[0]['id_user'];
    $_SESSION['user'] = $login[0]['role'];
    switch ($_SESSION['user']) {
      case 'Admin':
        header('Location:' . $url . 'view/admin');
        break;
      case 'Bendahara Yayasan':
        header('Location:' . $url . 'view/bendahara');
        break;
      case 'Tata Usaha':
        header('Location:' . $url . 'tata_usaha');
        break;
      case 'Yayasan':
        header('Location:' . $url . 'view/yayasan');
        break;
      case 'Kepala Sekolah':
        header('Location:' . $url . 'view/kepala');
        break;
    }
    exit;
  }
}
