<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title . ' | ' . $global_title ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets') ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets') ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets') ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets') ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->session->flashdata('msg') ?>
            <?= form_open('login') ?>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required />
              </div>
              <div style="margin-left: 0px !important;">
                <input type="submit" name="login-submit" value="Login" class="btn btn-lg btn-success btn-block">
              </div>
              <!-- <div>
                  <a class="reset_pass" href="#">Lost your password?</a>
              </div> -->

              <div class="clearfix"></div>

              <!-- <div class="separator">
                <p class="change_link">Ingin mendaftar sebagai pelamar?
                  <a href="<?= base_url('login/daftar') ?>" class="to_register"> Klik ini! </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div> -->
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
