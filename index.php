<?php
session_start();

if (isset($_SESSION['login'])) {
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
}
require_once('url.php');
require_once('proses/proses_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="<?= $url; ?>assets/css_login.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>

<body style="background-color: #56baed;">
  <!------ Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">

      <img src="<?= $url; ?>assets/logo.jpg" class="mt-5" width="100px" alt="User Icon" />
      <?php
      if (isset($_SESSION['notice'])) {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $_SESSION['notice']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
        unset($_SESSION['notice']);
      }
      ?>
      <!-- Login Form -->
      <form action="" method="POST">
        <input type="text" id="login" class="fadeIn" name="username" placeholder="Username">
        <input type="password" id="password" class="fadeIn" name="password" placeholder="Password">
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#" data-toggle="modal" data-target="#exampleModal">Forgot Password?</a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="alert alert-warning" role="alert">
        Silahkan hubungi admin !
      </div>
      <!-- <div class="modal-content">
        <div class="model-body">
        </div>
      </div> -->
    </div>
  </div>
</body>

</html>