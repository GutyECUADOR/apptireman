<?php
require_once '../../../core/models/OrdentModel.php'; // Funciones del modulo
$ordentrabajo = new \models\OrdentModel();
$action = $_GET['action'];


switch ($action) {
    case 'getAutos':
        $dato_ci = $_GET['dato_ci'];
        $preselect = $_GET['preselect'];
        $ordentrabajo->getAutosByCliente($dato_ci,$preselect);
        break;
    
    case 'getModeloAutos':
        $modeloAuto = $_GET['modeloAuto'];
        $ordentrabajo->getModeloAutos($modeloAuto);
        break;
    
    case 'getModelosLlantas':
        $marca = $_GET['marca'];
        $ordentrabajo->getModelosLlantas($marca);
        break;
    
    case 'getMedidasLlantas':
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $ordentrabajo->getMedidasLlantas($marca,$modelo);
        break;
    
    case 'getValorLlantas':
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $medida = $_GET['medida'];
        $ordentrabajo->getValorLlantas($marca,$modelo,$medida);
        break;
    
    case 'anulaOrdenT':
        $cod_ordenT = $_GET['codOrdenT'];
        $ordentrabajo->anularOrdenTrabajo($cod_ordenT);
        break;

    default:
        echo 'Opcion no definida';
        break;
}