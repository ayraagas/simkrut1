<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SIMkrut UII</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css') ?>">
  <link rel='stylesheet prefetch' href='<?php echo base_url('assets/css/font-awesome.min.css');  ?>'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styleloginadmin.css') ?>">
</head>
<body>
  <div class="container">
    <div class="info">
      <h1>Admin ONLY !</h1><span>Made by Agas Arya Widodo</span>
    </div>
  </div>
  <div class="form">
    <?php echo validation_errors(); ?>
    <?php echo form_open('login/verifyloginpenguji'); ?>
    <div class="thumbnail"><img src="<?php echo base_url('assets/pictures/hat.svg') ?>"/></div>
    <form class="login-form">
      <input type="text" name="username" placeholder="username" required />
      <input type="password" name="password" placeholder="password" required />
      <button type="submit">login</button>
    </form>
  </div>
  <script src='<?php echo base_url('assets/js/jquery.min.js') ?>'></script>

  <script src="<?php echo base_url('assets/js/indexadmin.js') ?>"></script> 
</body>
</html>
