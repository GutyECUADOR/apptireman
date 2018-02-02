<?php
    require_once './config/global.php';
    require_once './core/controllers/mainController.php';
    require_once './core/models/OrdentModel.php';
    require_once './core/models/mainModel.php';
    require_once './core/controllers/loginController.php';
    require_once './core/models/loginModel.php';
    require_once './core/controllers/ajaxController.php';
    require_once './core/models/ajaxModel.php';
    require_once './core/controllers/licenseController.php';
    require_once './core/models/licenseModel.php';
    require_once './core/controllers/utilidadesController.php';
    require_once './core/models/utilidadesModel.php';
    
    $app = new controllers\mainController();
    $app->loadtemplate();
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME?></title>
        <link rel="shortcut icon" href="./core/resources/draweable/icons/favicon.ico">
    </head>
    <body>
        <?php
     
        ?>
    </body>
</html>
