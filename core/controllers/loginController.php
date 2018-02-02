<?php namespace controllers;

class loginController  {
    
    public function loadtemplate() {
        require_once 'views\templateLogin.php';
    }
    
    public function actionValidaIngreso(){
        if (isset($_POST['txt_usuario'])&& isset($_POST['txt_password'])) {
            
            
                $arrayDatos = array("usuario"=>$_POST['txt_usuario'],"password"=>$_POST['txt_password']);
                   
                // Creacion de instancia de modellogin    
                $loginModel = new \models\loginModel();
               
                //Verificacion de registro en base de datos
                $validacionAcceso = $loginModel->validaIngreso($arrayDatos);
                
                //Funcion validar acceso retorna boolean
                    if ($validacionAcceso) {
                        $_SESSION["usuarioActivo"] = $validacionAcceso['usuario'];
                        $_SESSION["rucActivo"] = $validacionAcceso['ruc'];
                        $_SESSION["correoUsuario"] = $validacionAcceso['correo'];
                        $_SESSION["lv_acceso"] = $validacionAcceso['lv_acceso'];
                        $_SESSION["fotoActivo"] = $validacionAcceso['foto'];
                        $_SESSION["backgroundActivo"] = $validacionAcceso['background'];
                        header("Location: index.php?&action=inicio");  
                    }else{
                        echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel red darken-3 center-align">
                                    <span class="white-text center-align"><i class="material-icons small">error</i> Usuario o contraseña incorrecta.</span>
                                </div>
                            </div>
                        </div>    
                        ';
                    }
        }
    }
    
    public function getSidebarHeaderBackground() {
        if (isset($_SESSION["usuarioActivo"])){
            echo '<img src="./core/resources/draweable/imges/backgrounds/'.$_SESSION["backgroundActivo"].'" class="responsive-img">'; 
        }else{
            echo '<img src="./core/resources/draweable/imges/backgrounds/Android-Lollipop.png" class="responsive-img">';
        }
        
    }
    
    public function getSidebarHeaderPerfilPicture() {
        if (isset($_SESSION["usuarioActivo"])){
            echo '<img class="circle" src="./core/resources/draweable/imges/users/'.$_SESSION["fotoActivo"].'">';
        }else{
            echo '<img class="circle" src="./core/resources/draweable/imges/users/default-user-image.png">';
        }
    }
    
    public function getUserName() {
        if (isset($_SESSION["usuarioActivo"])){
            echo $_SESSION["usuarioActivo"];
        }else{
            echo 'Usuario standar';
        }
    }
    
    public function getCorreo() {
        if (isset($_SESSION["correoUsuario"])){
            echo $_SESSION["correoUsuario"];
        }else{
            echo '(Sin inicio de sesion)';
        }
    }
    
    
}
