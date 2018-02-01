<?php namespace controllers;

class ajaxController  {
 
    public function actionCatcherController($data){
                // Creacion de instancia de modelo  
                $ajaxModel = new \models\ajaxModel();
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getJSONCliente($data);
                return $respuesta;
     
    }
    
    public function actionJSONproducto($data) {
                $ajaxModel = new \models\ajaxModel();
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getJSONProducto($data);
                return $respuesta;
               
    }
    
    public function actionJSONgetAllDocuments($ruc,$fecha_INI, $fecha_FIN, $typoDOC) {
                $ajaxModel = new \models\ajaxModel();
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getAllDocumentsByTipeDoc($ruc,$fecha_INI, $fecha_FIN, $typoDOC);
                
                return $respuesta;
    }
    
    
}
