<?php
require_once '../../../core/controllers/ajaxController.php';
require_once '../../../core/models/OrdentModel.php';

class ajax{
    
    public $ruc_modal;
    public $clientename_modal;
    public $direccion_modal;
    public $telefono_modal;
    public $correo_modal;
    
    public function ejecutaAjax() {
        // Creacion de instancia de modellogin    
       
        $ajaxController = new \controllers\ajaxController();
        $respuestaAjax = $ajaxController->addCliente($this->ruc_modal, $this->clientename_modal, $this->direccion_modal, $this->telefono_modal, $this->correo_modal);
        echo $respuestaAjax;
    }
    
}


$ajax = new ajax();
$ajax->ruc_modal = $_POST['ruc_modal'];
$ajax->clientename_modal =$_POST['clientename_modal'];
$ajax->direccion_modal =$_POST['direccion_modal'];
$ajax->telefono_modal =$_POST['telefono_modal'];
$ajax->correo_modal =$_POST['correo_modal'];

$ajax->ejecutaAjax();
