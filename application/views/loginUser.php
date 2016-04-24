<!DOCTYPE html>
<html>
<head>
  <base href="<?php echo base_url(); ?>" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Login User</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css') ?>">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');  ?>'>
  <link rel='stylesheet prefetch' href='<?php echo base_url('assets/css/font-awesome.min.css');  ?>'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="pen-title">
    <h1>Login User</h1>
  </div>
   <?php echo validation_errors(); ?>
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 class="title">Login</h1>
      <form action="<?php echo base_url('login/verifyloginuser')  ?>" method="POST">
        <div class="input-container">
          <input type="text" id="Nim" name="nim" required="required"/>
          <label for="NIM">NIM</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="Password" name="password" required="required"/>
          <label for="Password">Password</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button type="submit" value="login"><span>Login</span></button>
        </div>
      </form>
    </div>
    <div class="card alt">
      <div class="toggle"></div>
      <h1 class="title">Register
        <div class="close"></div>
      </h1>
      <form action="<?php echo base_url('registerUser/register/do_register') ?>" method="POST" id="form-register">
        <div class="input-container">
          <input type="text" id="Nim" name="nim" required="required"/>
          <label for="Nim">NIM</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="text" id="Namalengkap" name="namalengkap" required="required"/>
          <label for="Namalengkap">Nama Lengkap</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password" name="password" required="required"/>
          <label for="Password">Password</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="repeat-password" name="repeat_password" required="required"/>
          <label for="Repeat Password">Repeat Password</label>
          <div class="bar"></div>
        </div>
        <input type="hidden" name="status" value="0"></input>
        <div class="button-container">
          <button type="submit" value="Sign up" name="register"><span>Sign Up</span></button>
        </div>
      </form>
    </div>
  </div>
  <script src='<?php echo base_url('assets/js/jquery.min.js') ?>'></script>
  <script src='<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>'></script>
  <script src='<?php echo base_url('assets/jquery-validation/dist/jquery.validate.min.js') ?>'></script>
  <script src='<?php echo base_url('assets/jquery-validation/dist/localization/messages_id.min.js') ?>'></script>

  <script src="<?php echo base_url('assets/js/index.js') ?>"></script>
</body>
</html>
