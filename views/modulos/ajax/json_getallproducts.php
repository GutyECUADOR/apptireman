<?php
require_once '../../../core/controllers/ajaxController.php';
require_once '../../../core/models/ajaxModel.php';

class ajax{
    
    public $datos;
    
    public function ejecutaAjax() {
        
        // Creacion de instancia de modellogin    
        
        $data = $this->datos;
        
        $ajaxController = new \controllers\ajaxController();
        $respuestaAjax = $ajaxController->actionJSONgetAllProducts($data);
        echo $respuestaAjax;
    }
    
}

$ajax = new ajax();
$ajax->datos = "";
$ajax->ejecutaAjax();
