<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="<?= $url; ?>assets/css_login.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <!------ Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <!-- <div class="fadeIn first"> -->
      <img src="<?= $url; ?>assets/logo.jpg" class="mt-5" width="100px" alt="User Icon" />
      <!-- </div> -->

      <!-- Login Form -->
      <form action="" method="POST">
        <input type="text" id="login" class="fadeIn" name="username" placeholder="Username">
        <input type="text" id="password" class="fadeIn" name="password" placeholder="Password">
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
    </div>
  </div>
</body>

</html>