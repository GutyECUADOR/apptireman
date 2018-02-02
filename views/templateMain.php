<?php 
     session_start();
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
         <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
       
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="views/css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="views/css/mystyles.css"  media="screen,projection"/>
        <link rel="stylesheet" href="views/css/file-input.css">
        
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="views/css/sweetalert2.css">
    </head>    
  <body>
    <header>
        <?php include_once 'views/modulos/navbar.php';?>
        <?php include_once 'views/modulos/sidebar.php';?> 
    </header>
    <main>
        
        <?php
            $inicioController = new controllers\mainController();
            $inicioController->actionCatcherController();
        
        ?>
        
        

    </main>    

    <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="views/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="views/js/materialize.js"></script>
        <script type="text/javascript" src="views/js/myJS.js"></script>  
        <script type="text/javascript" src="views/js/functions.js"></script>     
        <script type="text/javascript" src="views/js/custom-file-input.js"></script>
        <script src="views/js/sweetalert2.min.js"></script>
</body>
</html>