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
        $query = "SELECT *from tbl_cliente WHERE ruc = :ruc AND password = :password"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':ruc', $usuario); 
        $stmt->bindParam(':password', $password); 
        $stmt->execute(); 
       
        $resulset = $stmt->fetchAll();
        return $resulset;
           
        
    }
    
}
