<?php namespace models;
require_once 'conexion.php';

class ajaxModel  {
    
    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }

    function getAllDocumentsByTipeDoc($RUC, $fecha_INI, $fecha_FIN,  $tipoDOC){
        $query = ("SELECT A.*, B.nombre as ClienteN FROM tbl_transaccion as A INNER JOIN tbl_cliente as B ON A.ruc = B.ruc WHERE A.ruc = '$RUC'  AND a.tipo='$tipoDOC' AND A.fecha BETWEEN '$fecha_INI' AND '$fecha_FIN' LIMIT 10");
        $stmt = $this->instancia_cnx->query($query);
        $stmt->execute();
        return $resultset = $stmt->fetchAll();
        
        
    }
    

    public function getJSONProducto($cod_ingresado) {
        $statment = $this->instancia_cnx->query("SELECT * FROM productosservicios WHERE detalle='$cod_ingresado'");
        $resultset = $statment->fetchAll();

        if (($resultset)){
            foreach ($resultset as $row){
                $codigo = $row['cod_prod'];
                $producto = $row['detalle'];
                $valor = $row['valor'];

            }
            $rawdata = array(["codigo"=>$codigo, "producto"=>$producto, "valor"=>$valor]);
            return json_encode($rawdata);  

        }else{
            $rawdata = ""; 
            return json_encode($rawdata);  

        }

    }
    
    
    public function getJSONCliente($cod_ingresado) {
        $statment = $this->instancia_cnx->query("SELECT * FROM clientes WHERE CI=$cod_ingresado");
        $resultset = $statment->fetchAll();

        if (($resultset)){
            foreach ($resultset as $row){
                $ci = $row['CI'];
                $cliente = $row['cliente'];
                $direccion = $row['direccion'];
                $telefono = $row['telefono'];
                $correo = $row['correo'];

            }
            $rawdata = array(["cedula"=>$ci, "cliente"=>$cliente, "direccion"=>$direccion, "telefono"=>$telefono , "correo"=>$correo]);
            echo json_encode($rawdata);  

        }else{
            $rawdata = ""; 
            echo json_encode($rawdata);  

        }

    }
    
    public function getJSONgetAllProducts() {
        $statment = $this->instancia_cnx->query("SELECT detalle as name FROM productosservicios");
        $resultset = $statment->fetchAll();

        if (($resultset)){
             echo json_encode($resultset);  

        }else{
            $rawdata = ""; 
            echo json_encode($rawdata);  

        }

   
    }
    
    
}



   
    
