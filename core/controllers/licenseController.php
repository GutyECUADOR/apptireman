<?php namespace controllers;

class licenciaController  {
    
    public $nombre_fichero = './config/licenseWS.xml';
    private $instanciaLicenseModel;
    
    function __construct() {
        $this->instanciaLicenseModel = new \models\licenseModel();
    }

    public function validateLicenciaKey(){
         
         if (file_exists($this->nombre_fichero)) {
             $licenciaFILE = simplexml_load_file($this->nombre_fichero);
             if ($licenciaFILE->licencia->data['fechaValidez'] < date('Y-m-d')) {
             return TRUE;
            }else{
                return FALSE;
            }
         }else{
                return TRUE;
         }
    }
    
    public function enableSegurity($pagina){
        
        if($this->validateLicenciaKey()){
            header('location:index.php?action=acercade');
        }
        
        if (!isset($_SESSION["lv_acceso"])){
            $_SESSION["lv_acceso"] = 0;
        }
        
        if ($this->getNivelAcceso($pagina)['lv_acceso'] > $_SESSION["lv_acceso"]) {
            header('location:index.php?action=inicio');
        } 
    }
    
    public function getNivelAcceso($pagina) {
        $licenciaModel = $this->instanciaLicenseModel;
        $respuesta = $licenciaModel->getNivelAccesoPagina($pagina);
        return $respuesta;
    }
    
    public function getElementsMenuBySeccion($seccion) {
        $licenciaModel = $this->instanciaLicenseModel;
        $respuesta = $licenciaModel->getMenuBySeccion($seccion);
        return $respuesta;
    }


    public function getLicenseValues(){
        if (file_exists($this->nombre_fichero)) {
            echo "Fichero de licenciamiento correcto";
            $licenciaFILE = simplexml_load_file($this->nombre_fichero);
           
            $arrayDataLicencia = array('fechaValidez'=>$licenciaFILE->licencia->data['fechaValidez'],
                                       'propietario'=>$licenciaFILE->licencia->data->propietario,
                                       'direccion'=>$licenciaFILE->licencia->data->direccion,
                                       'key'=>$licenciaFILE->licencia->data->key,
                                       'tipokey'=>$licenciaFILE->licencia->data->tipokey,
                                       'descripcion'=>$licenciaFILE->licencia->data->descripcion,
                                       'estado'=>'Activada'
                                       );

            
            return $arrayDataLicencia;
            
        } else {
            echo "El fichero de licenciamiento no existe, consulte a soporte técnico N° Telefonico: <a>(+593)0999887479</a> o al correo <a>teamvidiasoft@gmail.com</a> para más información";
            
            $arrayDataLicencia = array('fechaValidez'=>"",
                                       'propietario'=>'No identificado (Licencia de Prueba)',
                                       'direccion'=>'(No identificada)',
                                       'key'=>'XXX-XXX-XXX',
                                       'tipokey'=>'Sin archivo de licenciamiento (Activacion Necesaria)',
                                       'descripcion'=>'El producto requiere activación para recibir actualizaciones y soporte tecnico',
                                       'estado'=>'Activación Necesaria'
                                       );
            return $arrayDataLicencia;
            
        }
  
    }
    
}
