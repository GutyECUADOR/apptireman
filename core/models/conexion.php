<?php namespace models;
/**
 * @author Lic. Gutiérrez R. José
 */
/**
* Provee una conexion PDO 
*
* Necesario colocar datos de conexion correctos en
* el archivo config_db.php
 * 
* Permite obtener datos como puerto, usuario, dbname charset, etc usados en la conexion
 * 
* Retorna object(PDO) si hubo conexion exitosa
 * 
* Retorna FALSE si no se pudo realizar la conexión
* 
*/
class conexion {
    //Atributos
    private $driver, $host, $port, $user, $pass, $dbname, $charset ;
    public $instancia;
    //Constructor
    public function __construct() {
        
        $this->driver = 'mysql';
        $this->host = "127.0.0.1";
        $this->port = "3306";
        $this->user = "root";
        $this->pass = "";
        $this->dbname = "apptireman";
        $this->charset = "utf8";
      
    }
    
    /** Retorna una instancia PDO**/
    public function conectarDB(){
        if ($this->driver=='mysql' || $this->driver==NULL){ //Comprobar si es del tipo MySQL
            try {
                $mysqlPDO = new \PDO('mysql:host='.$this->host.':'.$this->port.';dbname='.$this->dbname.'', $this->user, $this->pass);
                $mysqlPDO->exec("set names $this->charset"); // Añadimos el charset ñ y tildes
                return $mysqlPDO;   
            } catch (Exception $ex) {
                return FALSE;
            }
        }
            
       
    }
    
    function getInstanciaCNX(){
        if ($this->instancia != NULL || $this->instancia == '' ){
            return $this->conectarDB();
        }else{
            return $this->instancia;
        }
    }
    
    function getDriver() {
        return $this->driver;
    }

    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }
    function getPort() {
        return $this->port;
    }

    function setPort($port) {
        $this->port = $port;
    }

        function getPass() {
        return $this->pass;
    }

    function getDbname() {
        return $this->dbname;
    }

    function getCharset() {
        return $this->charset;
    }

    function setDriver($driver) {
        $this->driver = $driver;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setDbname($dbname) {
        $this->dbname = $dbname;
    }

    function setCharset($charset) {
        $this->charset = $charset;
    }


    
}

