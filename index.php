<?php
session_start();
require('url.php');
require('model/crud.php');
if (isset($_POST['submit'])) {
  $crud = new Crud;
  $data = array(
    'username' => $_POST['username'],
    'password' => sha1($_POST['password']),
  );
  $login = $crud->read_data('tbl_user', $data);
  if (!$login) {
    $_SESSION['notice'] = 'Username atau Password yang anda masukan salah !';
    header('Location:' . $url);
    exit;
  } else {
    $_SESSION['login'] = [true, $login[0]['id']];
    $_SESSION['user'] = $login[0]['role'];
    switch ($login[0]['role']) {
      case 'Admin':
        header('Location:' . $url . 'admin');
        break;
      case 'Bendahara Yayasan':
        header('Location:' . $url . 'bendahara');
        break;
      case 'Tata Usaha':
        header('Location:' . $url . 'tata_usaha');
        break;
      case 'Yayasan':
        header('Location:' . $url . 'yayasan');
        break;
      case 'Kepala Sekolah':
        header('Location:' . $url . 'kepala');
        break;
    }
    exit;
  }
} else {
  require('view/login/login.php');
}
