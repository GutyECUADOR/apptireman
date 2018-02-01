<?php namespace controllers;

class loginController  {
    
    public function loadtemplate() {
        require_once 'views\template.php';
    }
    
    public function actionCatcherController(){
        if (isset($_POST['txt_usuario'])&& isset($_POST['txt_password'])) {
            
            
                $arrayDatos = array("usuario"=>$_POST['txt_usuario'],"password"=>$_POST['txt_password']);
                   
                // Creacion de instancia de modellogin    
                $loginModel = new \models\loginModel();
               
                //Verificacion de registro en base de datos
                $arrayResultados = $loginModel->validaIngreso($arrayDatos);
               
                //Funcion validar acceso retorna array de resultados
                    if (!empty($arrayResultados)) {
                        session_start();
                        
                        $_SESSION["usuarioRUC"] =  $arrayResultados[0]['ruc'] ;
                        $_SESSION["usuarioNOMBRE"] =  $arrayResultados[0]['nombre'] ;
                        $_SESSION["usuarioEMAIL"] =  $arrayResultados[0]['email'] ;
                        $_SESSION["usuarioESTADO"] =  $arrayResultados[0]['estado'] ;
                        
                        header("Location: index.php?&action=inicio");
                        
                      
                    }else{
                        echo '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <p>Error al iniciar sesion: Usuario o contraseña incorrecta.</p>
                          </div>';
                       
                    }
                
               
        }
        
            
      
        
       
    }
    
}
