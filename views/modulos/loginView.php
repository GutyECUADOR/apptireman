<?php 
    if (isset($_SESSION["usuarioActivo"])){
        echo "Sigue Logeado";
        header('location:index.php?action=inicio');
        
    }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo APP_NAME?> | Login </title>

    <!-- Bootstrap -->
   
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo ROOT_PATH; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo ROOT_PATH; ?>assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo ROOT_PATH; ?>assets/animate/animate.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    
    <!-- Estilos Personalizados extra -->
    <link href="<?php echo ROOT_PATH; ?>assets/styles.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo ROOT_PATH; ?>assets/build/css/custom.css" rel="stylesheet">

    

    
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        
        <div class="animate form login_form wrapshadow">
        <img src="<?php echo ROOT_PATH; ?>assets/images/logo.png" class="logo" alt="logokao">
          <section class="login_content">
              
              <?php 
    
                $login = new controllers\loginController();
                $login->actionCatcherController();

              ?>
              
            <form action="" method="POST" autocomplete="on">
              <h1>Ingreso a Sistema</h1>
              <div>
                <input type="text" class="form-control" name="txt_usuario" placeholder="Nombre de Usuario o RUC" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="txt_password" placeholder="Contraseña" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="action" value="Ingresar">
                <a class="reset_pass" href="#">Olvidaste tu contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-lock"></i> Kao Sport Center</h1>
                  <p><?php echo date('Y')?> All Rights Reserved. v. <?php echo APP_VERSION?></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Kao Sport Center</h1>
                  <p><?php echo date('Y')?> All Rights Reserved.</p>
                  </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

    <!-- jQuery -->
    <script src="<?php echo ROOT_PATH; ?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- PNotify -->
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo ROOT_PATH; ?>assets/build/js/custom.js"></script>
   
<script>
    $(document).ready(function() {
        new PNotify({
          title: 'Estimado Usuario',
          type: 'info',
          delay: 15000,
          text: 'Sus credenciales de inicio de sesión para primer ingreso; son su RUC o Cédula tanto para usuario y contraseña. Recuerde realizar el cambio de clave una vez ingrese.',
          nonblock: {
              nonblock: false
          },
          styling: 'bootstrap3',
          addclass: 'dark'
      });
   
});

</script>