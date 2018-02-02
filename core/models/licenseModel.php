<?php namespace models;
require_once 'conexion.php';

class licenseModel  {
    
    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }

    public function getNivelAccesoPagina($pagina){
        $query = "SELECT lv_acceso, action FROM sidebar WHERE action = :action"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':action', $pagina); 
        $stmt->execute(); 
        $resultset = $stmt->fetch(\PDO::FETCH_ASSOC); 
        
        return $resultset;
    }
    
    public function getMenuBySeccion($seccion){
        $query = "SELECT * FROM sidebar WHERE seccion = :seccion"; 
        $stmt = $this->instancia_cnx->prepare($query); 
        $stmt->bindParam(':seccion', $seccion); 
        $stmt->execute(); 
        $resultset = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        
        return $resultset;
    }
    
    
    public function testFunction() {
        echo "Funcionando";
    }
}
