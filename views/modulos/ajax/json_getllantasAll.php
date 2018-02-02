<?php
require_once '../../../core/controllers/ajaxController.php';
require_once '../../../core/models/ajaxModel.php';

class ajax{
    
    public function ejecutaAjax() {
        
        // Creacion de instancia de modellogin    
      
        $ajaxController = new \controllers\ajaxController();
        $respuestaAjax = $ajaxController->actionJSONgetAllNeumaticos();
        echo $respuestaAjax;
    }
    
}

$ajax = new ajax();
$ajax->ejecutaAjax();
