<?php
    require_once './config/global.php';
    require_once './core/controllers/mainController.php';
    require_once './core/models/EDocsClass.php';
    require_once './core/models/mainModel.php';
    require_once './core/controllers/loginController.php';
    require_once './core/models/loginModel.php';
    require_once './core/controllers/ajaxController.php';
    require_once './core/models/ajaxModel.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME?></title>
        <link rel="shortcut icon" href="views/img/favicon.ico">
    </head>
    <body>
        <?php
     
        
        $app = new controllers\mainController();
        $app->loadtemplate();
        
        ?>
    </body>
</html>
