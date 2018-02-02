<?php
require_once '../../../core/controllers/ajaxController.php';
require_once '../../../core/models/OrdentModel.php';

class ajax{
    
    public $cod_llanta;
    public $detalle;
    public $marca;
    public $modelo;
    public $medida;
    public $cantidad;
    public $costo;
    
    public function ejecutaAjax() {
        // Creacion de instancia de modellogin    
       
        $ajaxController = new \controllers\ajaxController();
        $respuestaAjax = $ajaxController->addNeumatico($this->cod_llanta, $this->detalle, $this->marca, $this->modelo,$this->medida, $this->cantidad, $this->costo);
        echo $respuestaAjax;
    }
    
}

$ajax = new ajax();
$ajax->cod_llanta = strtoupper($_POST['codigo']);
$ajax->detalle = $_POST['detalle'];
$ajax->marca = $_POST['marca'];
$ajax->modelo = $_POST['modelo'];
$ajax->medida = $_POST['medida'];
$ajax->cantidad = $_POST['cantidad'];
$ajax->costo = $_POST['costo'];
$ajax->ejecutaAjax();
