<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?php echo APP_NAME ?> | Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo ROOT_PATH; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo ROOT_PATH; ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body>
    <div>
      <div>
        
        <?php 
            $inicioController = new controllers\mainController();
            $inicioController->actionCatcherController();
        
        ?>
     
      </div>
    </div>

	
  </body>
</html>
