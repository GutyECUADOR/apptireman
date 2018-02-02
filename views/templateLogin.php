<?php
  
   $login = new controllers\loginController();
   $login->actionCatcherController();
   
?>

<html lang="es">
<head>
        <meta charset="UTF-8">
         <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="views/css/materialize.css"/>
        <link type="text/css" rel="stylesheet" href="views/css/mystyles.css"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
        <link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
</head>

<body class="valign-wrapper grey lighten-2 ">
   
	<!-- Sign Up Card row -->
        <div class="container wrap">
            <div class="row">
              <div class="col s12">
                <div class="card z-depth-1">
                    
                    <div class="card-content">
                      <span class="card-title center"><h4>Inicio de Sesion</h4></span>
                      <form action="" method="POST" autocomplete="off">
                        <div class = "row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" id="txt_usuario" name="txt_usuario" class="validate">
                                <label for="txt_usuario">Usuario del Sistema o RUC</label>
                            </div>
                            
                          <div class="input-field col s12 m12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" id="txt_password" name="txt_password" class="validate">
                                <label for="password">Contraseña</label>
                          </div>
                          <div class="input-field col s12 m12 center">
                              <input type="submit" class="btn" name="action" value="login">
                          </div>
                        </div>
                      </form>


                  </div>

                </div>
              </div>
            </div><!-- End of Sign Up Card row -->
        </div>
            

    	
    <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="views/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="views/js/materialize.js"></script>
        <script type="text/javascript" src="views/js/myJS.js"></script>  
        <script type="text/javascript" src="views/js/functions.js"></script>     
        <script type="text/javascript" src="views/js/custom-file-input.js"></script>
        <script src="views/js/sweetalert.min.js"></script>  
</body>
</html>