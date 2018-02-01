<?php namespace models;
require_once 'conexion.php';

class EDocsClass {

    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }
    
    function getInstancia_cnx() {
        return $this->instancia_cnx;
    }
    
    function getAllDocumentsByRUC($RUC, $tipoDOC='FV', $fecha_INI, $fecha_FIN){
        $query = ("SELECT A.*, B.nombre as ClienteN FROM tbl_transaccion as A INNER JOIN tbl_cliente as B ON A.ruc = B.ruc WHERE A.ruc = '$RUC'  AND a.tipo='$tipoDOC' AND A.fecha BETWEEN '$fecha_INI' AND '$fecha_FIN' LIMIT 10");
        $stmt = $this->instancia_cnx->query($query);
        $stmt->execute();
        $resultset = $stmt->fetchAll();
        return $resultset;
    }
    
    function getDateNow() { 
      return date('Y-m-d');
    }
    
    function getTypeDocument($codDocument) {
        if ($codDocument=='FV')
        {
        $tdocument = "Factura";
        }
        elseif ($codDocument=='NC') 
        {
        $tdocument = "Nota de Crédito";    
        }
        elseif ($codDocument=='RT') 
        {
        $tdocument = "Retenciones";    
        }
        elseif ($codDocument=='GR') 
        {
        $tdocument = "Guía de Remisión";    
        }
        else
        {
        $tdocument = "SIN IDENTIFICAR";    
        }  
       return $tdocument;
    }
    
}