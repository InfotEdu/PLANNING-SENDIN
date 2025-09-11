<!DOCTYPE html>
<html lang="en">
    <head>
          <title><?=isset($title)?$title.' - Planning Sendin':'Planning Sendin' ?></title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
           <!-- Custom CSS -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
           <!-- jQuery 2.2.3 -->
          <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
           <link rel="shortcut icon" type="image/x-icon" href="https://planning.sendin.com/public/dist/img/icon.png" />
       
    </head>
<body style="">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="login-title">
                    <a href="https://www.sendin.com/" ><img style="width: 360px;background: #ffffffa8;" src="https://planning.sendin.com/public/dist/img/logo.png" alt="infoter"></a>
                    
                </div>
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
                <div class="form-box">
                    <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
                        <div class="input-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                            <input type="password" name="password" id="password" class="form-control" placeholder="mot de passe" >

                                <?php
                                    $primero = rand(1, 15);
                                    $segundo = rand(1, 15);
                                    $total = $primero + $segundo;
                                ?>

                                <div class="form-group">
                                    <p>Résolvez l'opération suivante <?php echo $primero ?> + <?php echo $segundo ?></p> 
                                    <input class="form-control" placeholder="Captcha" name="captcha" type="text"  value="">
                                    <input class="form-control" placeholder="CaptchaRes" name="resultado" type="hidden"  value=<?php echo $total ?>>
                                </div>

                            <input type="submit" name="submit" id="submit" class="form-control" value="Accéder">
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</body>

    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/dist/js/app.min.js"></script>
  

    <style type="text/css">

    .login-form input[type=submit] {
        background: #fff000 !important;
    }
    
    body{
        background:url('<?= base_url('public/dist/img/fondo-login.jpg')?>');
        /*background-position: center;*/
        background-size: cover;
     }
    .login-title{
        padding-top: 80px;
        color: #fff;
    }
    .login-title span{
        font-size: 30px;
        line-height: 1.9;
        display: block;
        font-weight: 700;
    }
    .form-box{
        position: relative;
        background: #ffffffa6;
        max-width: 375px;
        width: 100%;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        padding: 51px 20px 41px 20px;
    }

  
    .form-control{
        background: #ffffffd6;
    }
    .login-form input[type=text], .login-form input[type=password]{
        margin-bottom:10px;
    }

    .login-form input {
        outline: none;
        display: block;
        width: 100%;
        border: 1px solid #d9d9d9;
        margin: 0 0 20px;
        padding: 10px 15px;
        box-sizing: border-box;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        font-wieght: 400;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
    }

    .login-form input[type=submit]{
        cursor: pointer;
        background: #33b5e5;
        width: 100%;
        border: 0;
        padding: 8px 15px;
        color: #000;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        font-weight: bold;
    }
    </style>
</html>