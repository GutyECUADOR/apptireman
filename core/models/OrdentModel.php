<?php namespace models;
require_once 'conexion.php';

class OrdentModel {

    private $instancia_cnx;
    
    public function __construct() {
        $instanciaDB = new \models\conexion();
        $instanciaLista = $instanciaDB->getInstanciaCNX();
        $this->instancia_cnx = $instanciaLista;
    }
    
    function getInstancia_cnx() {
        return $this->instancia_cnx;
    }
    
    function getnewCodigo() {
        $resultset = $this->instancia_cnx->query("CALL create_aux_cod('ORT');");
        $codigo = $resultset->fetch();
        return $codigo['newCod'];
    }
    
    function getAllEmpleadosCargos(){
        $stmt = "SELECT * FROM cargosempleados";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset;
    }
    
    function getOrdenByID($codOrden){
        $resultset = $this->instancia_cnx->query("SELECT A.*, B.cliente as clienteN, C.empleado as asesorN, D.empleado as mecanicoN, E.modelo as autoN, F.modelo_auto FROM cab_ordent as A INNER JOIN clientes as B ON A.cliente = B.CI INNER JOIN empleados as C ON A.asesor = C.cod_empleado INNER JOIN empleados as D ON A.mecanico = D.cod_empleado INNER JOIN autocliente as E ON E.placa = A.automovil INNER JOIN modelosautos as F on E.modelo = F.cod_auto WHERE codOrden = '$codOrden';");
        return $resultset->fetch();
    }
    
    function getDetalleOrdenByID($codOrden){
        $resultset = $this->instancia_cnx->query("SELECT A.*, B.detalle FROM mov_ordent as A INNER JOIN productosservicios as B ON A.codProducto = B.cod_prod WHERE codOrden = '$codOrden';");
        return $resultset->fetchAll();
    }
    
    function getDetalleLlantasByID($codOrden){
        $resultset = $this->instancia_cnx->query("SELECT A.*, B.marca, B.modelo, B.medida FROM mov_llantasort as A INNER JOIN llantas as B ON A.cod_llanta = B.cod_llanta WHERE codOrden = '$codOrden';");
        return $resultset->fetchAll();
    }
    
    function getFormasPagoByID($codOrden){
        $resultset = $this->instancia_cnx->query("SELECT * FROM infopago_ordent WHERE codOrdent = '$codOrden';");
        return $resultset->fetchAll();
    }
    
    
    function getSearchLlantasByCI($cedula, $fechaINI, $fechaFIN){
        $resultset = $this->instancia_cnx->query("SELECT * FROM mov_llantasort as A INNER JOIN cab_ordent AS B ON A.codOrden = B.codOrden INNER JOIN empleados as C ON C.cod_empleado = B.asesor WHERE B.asesor = $cedula AND B.fecha BETWEEN '$fechaINI' and '$fechaFIN';");
        return $resultset->fetchAll();
    }
    
    function getSearchLlantasByMarca($marca, $fechaINI, $fechaFIN){
        
        $resultset = $this->instancia_cnx->query("SELECT A.codOrden, L.marca as marcaLlanta, L.modelo as modeloLlanta, L.medida as medidaLlanta, A.cantidad as cantLlanta, A.valor as valorLlanta, B.*, C.*, D.* FROM mov_llantasort as A INNER JOIN cab_ordent AS B ON A.codOrden = B.codOrden INNER JOIN empleados as C ON C.cod_empleado = B.asesor INNER JOIN infopago_ordent as D on D.codOrdent = A.codOrden INNER JOIN llantas as L on L.cod_llanta = A.cod_llanta WHERE B.fecha BETWEEN '$fechaINI' and '$fechaFIN' AND marca = '$marca';");
        return $resultset->fetchAll();
    }
    
    function getSearchOrdenTrabajo($cedula, $fechaINI, $fechaFIN){
        
        $stmt = "SELECT A.*, B.empleado, C.empleado as empleadoN, D.cliente as clienteN FROM cab_ordent as A INNER JOIN empleados as B on A.asesor = B.cod_empleado INNER JOIN empleados AS C ON C.cod_empleado = A.mecanico INNER JOIN clientes as D ON D.CI = A.cliente WHERE A.cliente = $cedula AND estado = '0' AND A.fecha BETWEEN '$fechaINI' and '$fechaFIN' ORDER BY codOrden DESC LIMIT 100";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset->fetchAll();
    }

    function getSearchTrabajosPendientesMecanicos($cedula, $fechaINI, $fechaFIN){
        $stmt = "SELECT A.*, B.empleado, C.empleado as empleadoN, D.cliente as clienteN FROM cab_ordent as A INNER JOIN empleados as B on A.asesor = B.cod_empleado INNER JOIN empleados AS C ON C.cod_empleado = A.mecanico INNER JOIN clientes as D ON D.CI = A.cliente WHERE A.mecanico = $cedula AND estado = '0' AND A.fecha BETWEEN '$fechaINI' and '$fechaFIN' ORDER BY codOrden DESC LIMIT 100";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset->fetchAll();
    }

    function getDetalleTrabajosPendientesMecanicos($ordenTrabajo){
        $stmt = "SELECT * FROM mov_ordent as A INNER JOIN productosservicios as B ON A.codProducto = B.cod_prod WHERE codOrden = '$ordenTrabajo'";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset->fetchAll();
    }
    
    
    function getTOP10ordenesT(){
        $stmt = "SELECT * FROM cab_ordent WHERE estado = '0' ORDER BY codOrden DESC LIMIT 12";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset;
    }
    
    function getTOP100ordenesT(){
        $stmt = "SELECT A.*, B.empleado, C.empleado as empleadoN, D.cliente as clienteN FROM cab_ordent as A INNER JOIN empleados as B on A.asesor = B.cod_empleado INNER JOIN empleados AS C ON C.cod_empleado = A.mecanico INNER JOIN clientes as D ON D.CI = A.cliente  WHERE estado = '0' ORDER BY codOrden DESC LIMIT 100";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset;
    }
    
    function getInventarioProductos(){
        $stmt = "SELECT * FROM productosservicios";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset;
    }
    
    function getInventarioLlantas(){
        $stmt = "SELECT * FROM llantas";
        $resultset = $this->instancia_cnx->query($stmt);
        return $resultset;
    }
    
    
    function insertOrdenT($codOrden,$codAsesor,$codMecánico,$codCliente,$fecha,$placaAuto,$kilomet,$ivaLlantas,$descuentoLlantas,$valorLlantas,$ivaProductos,$descuentoProductos,$valorProductos, $observacion, $editadorpor){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO cab_ordent (id, codOrden, asesor, mecanico, cliente, fecha, automovil, kilometraje, ivaLlantas, descuentoLlantas, valorLlantas, ivaProductos, descuentoProd, valorProductos, observacion, editadopor) VALUES (NULL, :codOrden, :asesor, :mecanico, :cliente, :fecha, :automovil, :kilometraje, :ivaLlantas, :descuentoLlantas, :valorLlantas, :ivaProductos, :descuentoProductos, :valorProductos, :observacion, :editadorpor);");
        $stmt->bindParam(':codOrden', $codOrden);
        $stmt->bindParam(':asesor', $codAsesor);
        $stmt->bindParam(':mecanico', $codMecánico);
        $stmt->bindParam(':cliente', $codCliente);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':automovil', $placaAuto);
        $stmt->bindParam(':kilometraje', $kilomet);
        $stmt->bindParam(':ivaLlantas', $ivaLlantas);
        $stmt->bindParam(':descuentoLlantas', $descuentoLlantas);
        $stmt->bindParam(':valorLlantas', $valorLlantas);
        $stmt->bindParam(':ivaProductos', $ivaProductos);
        $stmt->bindParam(':descuentoProductos', $descuentoProductos);
        $stmt->bindParam(':valorProductos', $valorProductos);
        $stmt->bindParam(':observacion', $observacion);
        $stmt->bindParam(':editadorpor', $editadorpor);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    function updateOrdenT($codOrden,$codAsesor,$codMecánico,$codCliente,$fecha,$placaAuto,$kilomet,$ivaLlantas,$descuentoLlantas,$valorLlantas,$ivaProductos,$descuentoProductos,$valorProductos, $observacion, $editadorpor){
        
        $stmt = $this->instancia_cnx->prepare("UPDATE cab_ordent SET asesor=:asesor, mecanico=:mecanico, cliente=:cliente, automovil=:automovil, kilometraje=:kilometraje, ivaLlantas=:ivaLlantas, descuentoLlantas=:descuentoLlantas, valorLlantas=:valorLlantas, ivaProductos=:ivaProductos, descuentoProd=:descuentoProd, valorProductos=:valorProductos, observacion=:observacion, editadopor=:editadorpor WHERE codOrden=:codOrden;");
        $stmt->bindParam(':codOrden', $codOrden);
        $stmt->bindParam(':asesor', $codAsesor);
        $stmt->bindParam(':mecanico', $codMecánico);
        $stmt->bindParam(':cliente', $codCliente);
        $stmt->bindParam(':automovil', $placaAuto);
        $stmt->bindParam(':kilometraje', $kilomet);
        $stmt->bindParam(':ivaLlantas', $ivaLlantas);
        $stmt->bindParam(':descuentoLlantas', $descuentoLlantas);
        $stmt->bindParam(':valorLlantas', $valorLlantas);
        $stmt->bindParam(':ivaProductos', $ivaProductos);
        $stmt->bindParam(':descuentoProd', $descuentoProductos);
        $stmt->bindParam(':valorProductos', $valorProductos);
        $stmt->bindParam(':observacion', $observacion);
        $stmt->bindParam(':editadorpor', $editadorpor);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    
    
    
    function insertExtrasOrdenT($codOrdent,$combustible,$radio,$encendedor,$cAlarma,$antena,$tSeguridad,$tGasolina,$repuestollanta,$gata,$ruedasllave){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO autoextras_ordent (id, codOrdent, combustible, radio, encendedor, cAlarma, antena, tSeguridad, tGasolina, repuestollanta, gata, ruedasllave) VALUES (NULL, :codOrdent, :combustible, :radio, :encendedor, :cAlarma, :antena, :tSeguridad, :tGasolina, :repuestollanta, :gata, :ruedasllave);");
        $stmt->bindParam(':codOrdent', $codOrdent);
        $stmt->bindParam(':combustible', $combustible);
        $stmt->bindParam(':radio', $radio);
        $stmt->bindParam(':encendedor', $encendedor);
        $stmt->bindParam(':cAlarma', $cAlarma);
        $stmt->bindParam(':antena', $antena);
        $stmt->bindParam(':tSeguridad', $tSeguridad);
        $stmt->bindParam(':tGasolina', $tGasolina);
        $stmt->bindParam(':repuestollanta', $repuestollanta);
        $stmt->bindParam(':gata', $gata);
        $stmt->bindParam(':ruedasllave', $ruedasllave);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    function insertFormaPagoOrdenT($codOrdent, $cheque, $tcredito, $efectivo, $credito){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO infopago_ordent (id, codOrdent, cheque, tcredito, efectivo, credito) VALUES (NULL, :codOrdent, :cheque, :tcredito, :efectivo, :credito);");
        $stmt->bindParam(':codOrdent', $codOrdent);
        $stmt->bindParam(':cheque', $cheque);
        $stmt->bindParam(':tcredito', $tcredito);
        $stmt->bindParam(':efectivo', $efectivo);
        $stmt->bindParam(':credito', $credito);
        $stmt->execute();
        return $stmt->rowCount();
       
    }
    
    function updateFormaPagoOrdenT($codOrdent, $cheque, $tcredito, $efectivo, $credito){
        
        $stmt = $this->instancia_cnx->prepare("UPDATE infopago_ordent SET cheque=:cheque, tcredito=:tcredito, efectivo=:efectivo, credito=:credito WHERE codOrdent=:codOrdent;");
        $stmt->bindParam(':codOrdent', $codOrdent);
        $stmt->bindParam(':cheque', $cheque);
        $stmt->bindParam(':tcredito', $tcredito);
        $stmt->bindParam(':efectivo', $efectivo);
        $stmt->bindParam(':credito', $credito);
        $stmt->execute();
        return $stmt->rowCount();
       
    }

    
    // Ejecuta querry de insercion, devuelve numero de filas afectadas
    function insertMovOrdenT($codOrdent,$codUnico,$codProducto,$cantidad,$precio){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO mov_ordent (id, codOrden, codUnico, codProducto, cantidad, valor) VALUES (NULL, :codOrdent, :codUnico, :codProducto, :cantidad, :precio) ON DUPLICATE KEY UPDATE codUnico=:codUnico, codProducto=:codProducto, cantidad=:cantidad, valor=:precio;");
        $stmt->bindParam(':codOrdent', $codOrdent);
        $stmt->bindParam(':codUnico', $codUnico);
        $stmt->bindParam(':codProducto', $codProducto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    
    // Ejecuta querry de insercion, devuelve numero de filas afectadas
    function insertLlantasOrdenT($codOrdent,$codUnico,$cod_llanta,$cantidad,$valor){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO mov_llantasort (id, codOrden, codUnico,cod_llanta, cantidad, valor) VALUES (NULL, :codOrdent, :codUnico, :cod_llanta, :cantidad, :valor) ON DUPLICATE KEY UPDATE codUnico=:codUnico, cod_llanta=:cod_llanta, cantidad=:cantidad, valor=:valor");
        $stmt->bindParam(':codOrdent', $codOrdent);
        $stmt->bindParam(':codUnico', $codUnico);
        $stmt->bindParam(':cod_llanta', $cod_llanta);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    function searchMovOrdenT($idOrden,$codOrden){
        $resultset = $this->instancia_cnx->query("SELECT * FROM mov_ordent WHERE id = '$idOrden' AND codOrden='$codOrden'");
        return $resultset->rowCount();
    }
    
    
    
    // Ejecuta querry de insercion, devuelve numero de filas afectadas
    function insertClienteNuevo($CI,$clientename,$direccion,$telefono,$correo){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO clientes (CI, cliente, direccion, telefono, correo) VALUES (:CI, :cliente, :direccion, :telefono, :correo)");
        $stmt->bindParam(':CI', $CI);
        $stmt->bindParam(':cliente', $clientename);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    
    function insertAutoClienteNuevo($cliente_CI,$modelo_Auto,$placa,$año,$color){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO autocliente (cliente_id, modelo, placa, color) VALUES (:cliente_id, :modelo, :placa, :color)");
        $stmt->bindParam(':cliente_id', $cliente_CI);
        $stmt->bindParam(':modelo', $modelo_Auto);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':color', $color);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    // Ejecuta querry de insercion, devuelve numero de filas afectadas
    function insertProductoNuevo($cod_prod,$detalle,$cantidad,$valor){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO productosservicios (cod_prod, detalle, cantidad, valor) VALUES (:cod_prod, :detalle, :cantidad, :valor)");
        $stmt->bindParam(':cod_prod', $cod_prod);
        $stmt->bindParam(':detalle', $detalle);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    // Ejecuta querry de insercion, devuelve numero de filas afectadas
    function insertNeumaticoNuevo($cod_llanta,$detalle,$marca,$modelo,$medida,$cantidad,$valor){
        
        $stmt = $this->instancia_cnx->prepare("INSERT INTO llantas (cod_llanta, detalle, marca, modelo, medida, cantidad, valor) VALUES (:cod_llanta, :detalle, :marca, :modelo, :medida,:cantidad,:valor)");
        $stmt->bindParam(':cod_llanta', strtoupper($cod_llanta));
        $stmt->bindParam(':detalle', strtoupper($detalle));
        $stmt->bindParam(':marca', strtoupper($marca));
        $stmt->bindParam(':modelo', strtoupper($modelo));
        $stmt->bindParam(':medida', strtoupper($medida));
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        
        return $stmt->rowCount();
       
    }
    
    
            
    // Returna HTML select opcion con datos de los autos del cliente
    function getAutosByCliente($ci_cliente,$preseleccionado) {
       
        $resultset = $this->instancia_cnx->query("SELECT * FROM autocliente as A INNER JOIN modelosautos as B on A.modelo=B.cod_auto WHERE cliente_id = '$ci_cliente'");

        foreach ($resultset as $row) {
            if ( $row['placa']==$preseleccionado) {
                echo '<option value="' . $row['placa'] . '" selected>' . $row['modelo_auto'] . ' (' . $row['placa'] . ')</option>';
            }else{
                echo '<option value="' . $row['placa'] . '">' . $row['modelo_auto'] . ' (' . $row['placa'] . ')</option>';
            }
            
        }
    }
    
    // Returna HTML select opcion con datos de los autos del cliente
    function getModeloAutos($cod_MarcaAuto) {
       
        $resultset = $this->instancia_cnx->query("SELECT * FROM modelosautos WHERE marca = '$cod_MarcaAuto' ORDER BY modelo_auto");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['cod_auto'] . '">' . $row['modelo_auto'] . '</option>';
        }
    }
    
    // Returna HTML select opcion con datos de los autos del cliente
    function getModelosLlantas($marca) {
       
        $resultset = $this->instancia_cnx->query("SELECT cod_llanta, modelo FROM llantas where marca = '$marca' GROUP BY modelo");

        echo '<option value="" disabled selected>Seleccione</option>';
        foreach ($resultset as $row) {
            echo '<option value="' . $row['modelo'] . '">' . $row['modelo'] . '</option>';
        }
    }
    
    // Returna HTML select opcion con datos de los autos del cliente
    function getMedidasLlantas($marca,$modelo) {
       
        $resultset = $this->instancia_cnx->query("SELECT * FROM llantas WHERE marca = '$marca' AND modelo = '$modelo'");

        echo '<option value="" disabled selected>Seleccione</option>';
        foreach ($resultset as $row) {
            echo '<option value="' . $row['medida'] . '">' . $row['medida'] . '</option>';
        }
    }
    
    // Returna HTML select opcion con datos de los autos del cliente
    function getValorLlantas($marca,$modelo,$medida) {
       
        $statment = $this->instancia_cnx->query("SELECT * FROM llantas WHERE marca = '$marca' AND modelo = '$modelo' and medida = '$medida'");
        $resultset = $statment->fetchAll();

        if (($resultset)){
            foreach ($resultset as $row){
                $codigo = $row['cod_llanta'];
                $producto = $row['detalle'];
                $modelo = $row['modelo'];
                $medida = $row['medida'];
                $valor = $row['valor'];

            }
            $rawdata = array(["codigo"=>$codigo, "producto"=>$producto, "valor"=>$valor, "modelo"=>$modelo, "medida"=>$medida]);
            echo json_encode($rawdata);  
            return json_encode($rawdata);  

        }else{
            $rawdata = ""; 
            return json_encode($rawdata); 
            

        }

    

    }
    

    function getMecanicos() {
        
        $resultset = $this->instancia_cnx->query("SELECT * FROM empleados WHERE cod_cargo LIKE 'MEC%'");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['cod_empleado'] . '">' . $row['empleado'] . '</option>';
        }
    }

     function getAsesores() {
        
        $resultset = $this->instancia_cnx->query("SELECT * FROM empleados WHERE cod_cargo LIKE 'ASE%'");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['cod_empleado'] . '">' . $row['empleado'] . '</option>';
        }
    }
    
    function getClientes() {
        
        $resultset = $this->instancia_cnx->query("SELECT * FROM clientes order by Cliente ASC");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['CI'] . '">' . $row['cliente'] . ' - '. $row['CI'] .' </option>';
        }
    }
    
    
    function getMarcasAutos() {
        
        $resultset = $this->instancia_cnx->query("SELECT id, marca FROM modelosautos GROUP BY marca");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['marca'] . '">' . $row['marca'] .'</option>';
        }
    }
    
    function getMarcasLlntas() {
        
        $resultset = $this->instancia_cnx->query("SELECT id, marca FROM modelosllantas GROUP BY marca");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['marca'] . '">' . $row['marca'] .'</option>';
        }
    }
    
    function getModelosAutos() {
        
        $resultset = $this->instancia_cnx->query("SELECT * FROM modelosautos");

        foreach ($resultset as $row) {
            echo '<option value="' . $row['modelo_auto'] . '">' . $row['modelo_auto'] .'</option>';
        }
    }
    
    function validaUsuarioSistema($usuario, $contrasena) {

        $resultset = $this->instancia_cnx->query("SELECT * FROM empleados WHERE empleado = '$usuario' AND password='$contrasena'");

        if ($resultset) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function anularOrdenTrabajo($ordenTrabajo){
        $resultset = $this->instancia_cnx->query("UPDATE cab_ordent SET estado='1' WHERE codOrden='$ordenTrabajo'");
        if ($resultset->rowCount()>=1) {
            return $resultset->rowCount();
        } else {
            return FALSE;
        }
    }
    
}
