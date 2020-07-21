<?php
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
    header('Location:../login');
    exit;
  } else {
    $_SESSION['login'] = [true, $pelanggan[0]['id_plgn']];
    header('Location:../pelanggan');
    exit;
  }
} else {
  require('view/login/login.php');
}
// require('view/dashboard.php');
// require('view/login/login.php');
