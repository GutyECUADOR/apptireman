<?php namespace models;
require_once 'conexion.php';

class loginModel  {
    
    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }

    public function validaIngreso($arrayDatos){
        $usuario = $arrayDatos['usuario'];
        $password = $arrayDatos['password'];
        $query = "SELECT * from tbl_usuarios WHERE usuario = :usuario AND password = :password"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':usuario', $usuario); 
        $stmt->bindParam(':password', $password); 
        $stmt->execute(); 
        $rowAfected = $stmt->rowCount(); 
        
        if($rowAfected==1){ 
            return $stmt->fetch();
            }else{
            return FALSE;    
            }
           
        
    }
    
    public function testFunction() {
        echo "Funcionando";
    }
}
