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
    
    
    public function actionJSONllantas($data) {
                $ajaxModel = new \models\ajaxModel();
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getJSONLlantas($data);
                
                return $respuesta;
               
    }
    
    public function actionJSONgetAllProducts() {
                $ajaxModel = new \models\ajaxModel();
               
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getJSONgetAllProducts();
                
                return $respuesta;
    }
    
    public function actionJSONgetAllNeumaticos() {
                $ajaxModel = new \models\ajaxModel();
               
                //Indique funcion que sera devuelta
                $respuesta = $ajaxModel->getJSONAllNeumaticos();
                
                return $respuesta;
    }
    
    public function addCliente($CI,$clientename,$direccion,$telefono,$correo) {
                $ajaxModel = new \models\OrdentModel();
               
                if ($CI=='' || $clientename == ''){
                        $respuesta = 'No se realizo el registro, campos vacios';
                }  else {
                    //Indique funcion que sera devuelta
                    $filasafectadas = $ajaxModel->insertClienteNuevo($CI,$clientename,$direccion,$telefono,$correo);

                    if ($filasafectadas>=1){     
                        $respuesta = 'Registro Exitoso';       
                    }
                    else
                    {
                        $respuesta = 'Error: No se realizo el registro'; 
                    }    
                }
                
                return $respuesta;
    }
    
    public function addProducto($cod_prod,$detalle,$cantidad,$valor){
                $ajaxModel = new \models\OrdentModel();
                
                if ($cod_prod=='' || $detalle == '' || $valor == ''){
                        $respuesta = 'No se realizo el registro, campos vacios';
                }  else {
                    //Indique funcion que sera devuelta
                    $filasafectadas = $ajaxModel->insertProductoNuevo($cod_prod, $detalle, $cantidad, $valor);

                    if ($filasafectadas>=1){     
                        $respuesta = 'Registro Exitoso';       
                    }
                    else
                    {
                        $respuesta = 'Error: No se realizo el registro'; 
                    }    
                }
                
                return $respuesta;
    }
    
    public function addNeumatico($cod_llanta,$detalle,$marca, $modelo,$medida,$cantidad,$valor){
                $ajaxModel = new \models\OrdentModel();
                
                if ($cod_llanta=='' || $detalle == '' || $valor == '' || $marca == ''){
                        $respuesta = 'No se realizo el registro, campos vacios';
                }  else {
                    //Indique funcion que sera devuelta
                    $filasafectadas = $ajaxModel->insertNeumaticoNuevo($cod_llanta, $detalle, $marca, $modelo, $medida, $cantidad, $valor);

                    if ($filasafectadas>=1){     
                        $respuesta = 'Registro Exitoso';       
                    }
                    else
                    {
                        $respuesta = 'Error: No se realizo el registro'; 
                    }    
                }
                
                return $respuesta;
    }

    
}
