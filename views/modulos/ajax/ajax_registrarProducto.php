<?php
require_once '../../../core/controllers/ajaxController.php';
require_once '../../../core/models/OrdentModel.php';

class ajax{
    
    public $codigo;
    public $producto;
    public $cantidad;
    public $valor;
   
    public function ejecutaAjax() {
        // Creacion de instancia de modellogin    
       
        $ajaxController = new \controllers\ajaxController();
        $respuestaAjax = $ajaxController->addProducto($this->codigo, $this->producto, $this->cantidad, $this->valor);
        echo $respuestaAjax;
    }
    
}


$ajax = new ajax();
$ajax->codigo = $_POST['codigo'];
$ajax->producto =$_POST['producto'];
$ajax->cantidad =$_POST['cantidad'];
$ajax->valor =$_POST['valor'];

$ajax->ejecutaAjax();
