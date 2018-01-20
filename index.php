<?php
	require_once './models/conexion.php';
    $app = new models\conexion();
    var_dump($app->conectarDB());
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME?></title>
        <link rel="shortcut icon" href="./core/resources/draweable/icons/favicon.ico">
    </head>
    <body>
    </body>
</html>
