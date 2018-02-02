<?php namespace controllers;

class mainController {
    
   
    public function loadtemplate(){
        include 'views/templateMain.php';
    }
    
    public function actionCatcherController(){
        if (isset($_GET['action'])){
           $action = $_GET['action'];
           $contenido = \models\mainModel::actionCatcherModel($action);
           include $contenido; 
        }else{
           $action = 'default';
           $contenido = \models\mainModel::actionCatcherModel($action);
           include $contenido; 
        }
       
    }
    
    public function registrarOrdenTrabajo() {
        if (isset($_POST['txt_ci_ruc']) && isset($_POST['seleccion_asesor']) && isset($_POST['seleccion_mecanico']) && isset($_POST['seleccion_vehiculo']) ) {
            
            // Carga de Imagenes
                    
                    $ordentrabajo = new \models\OrdentModel();
                    //SETEO DE DATOS     
                    $codOrden = $ordentrabajo->getnewCodigo(); // Codigo generado por SP
                    $codAsesor = $_POST['seleccion_asesor'];
                    $codMecánico = $_POST['seleccion_mecanico'];
                    $codCliente = $_POST['txt_ci_ruc'];
                    $fecha = date ("Y-n-d"); 
                    $placaAuto = $_POST['seleccion_vehiculo'];
                    $kilomet = $_POST['txt_kilometraje'];
                    $ivaLlantas = $_POST['txt_iva_llantas'];
                    $descuentoLlantas = $_POST['txt_descuento_llantas'];
                    $valorLlantas = $_POST['txt_apagar_llantas'];
                    $ivaProductos = $_POST['txt_iva_productos'];
                    $descuentoProductos = $_POST['txt_descuento_productos'];
                    $valorProductos = $_POST['txt_apagar_productos'];
                   
                            
                    $observacion = $_POST['texta_observacion'];
                    
                    if (isset($_SESSION['rucActivo'])){
                        $editadopor = $_SESSION['rucActivo'];
                    }else{
                        $editadopor='';
                    }
                    
                    $numdoc=1; // Dirige numero de archivo doc
                    $count=0; // Dirige array
                  
                    //if ($_FILES['input_imagenes']['size']<200000){
                        $array_files = $_FILES['input_imagenes']['name']; // Obtenemos array de elementos html

                        foreach ($array_files as $file) 
                        {
                            if (!empty($file)){ // Comprobamos que elemento no este vacio
                                $newname = "$codOrden"."_".$numdoc.".jpg"; // Asignamos nombre referencial
                                if(move_uploaded_file($_FILES['input_imagenes']['tmp_name'][$count], SITE_ROOTSIMPLE.$newname)){ 
                                } 
                                else{
                                   echo "No se ha cargado el archivo (limite excedido): ".$newname;
                                  
                                }

                                $numdoc++;
                                $count++;
                            } 
                        } 

                    //}

                    $combustible = $_POST['range_combustible'];
                    
                    if (!isset($_POST['chk_radio'])){
                        $radio = 0;
                    }else{
                        $radio = 1;
                    }
                    
                     if (!isset($_POST['chk_encendedor'])){
                        $encendedor = 0;
                    }else{
                        $encendedor = 1;
                    }
                    
                     if (!isset($_POST['chk_controlAlarma'])){
                        $cAlarma = 0;
                    }else{
                        $cAlarma = 1;
                    }
                    
                     if (!isset($_POST['chk_antena'])){
                        $antena = 0;
                    }else{
                        $antena = 1;
                    }
                    
                     if (!isset($_POST['chk_tuercaSeguridad'])){
                        $tSeguridad = 0;
                    }else{
                        $tSeguridad = 1;
                    }
                    
                     if (!isset($_POST['chk_tapaGasolina'])){
                        $tGasolina = 0;
                    }else{
                        $tGasolina = 1;
                    }
                    
                     if (!isset($_POST['chk_llantaRepuesto'])){
                        $repuestollanta = 0;
                    }else{
                        $repuestollanta = 1;
                    }
                    
                    if (!isset($_POST['chk_gata'])){
                        $gata = 0;
                    }else{
                        $gata = 1;
                    }
                    
                    if (!isset($_POST['chk_llaveRuedas'])){
                        $ruedasllave = 0;
                    }else{
                        $ruedasllave = 1;
                    }
                    
                    // Formas de Pago
                    
                    if (!isset($_POST['chk_cheque'])){
                        $cheque = 0;
                    }else{
                        $cheque = 1;
                    }
                    
                    if (!isset($_POST['chk_tarjetaCredito'])){
                        $tcredito = 0;
                    }else{
                        $tcredito = 1;
                    }
                    
                    if (!isset($_POST['chk_efectivo'])){
                        $efectivo = 0;
                    }else{
                        $efectivo = 1;
                    }
                    
                    if (!isset($_POST['chk_credito'])){
                        $credito = 0;
                    }else{
                        $credito = 1;
                    }
                    
                    
                    //REGISTRO EN LA BASE DE DATOS 
                    
                    if ($ordentrabajo->insertOrdenT($codOrden, $codAsesor, $codMecánico, $codCliente, $fecha, $placaAuto, $kilomet, $ivaLlantas, $descuentoLlantas, $valorLlantas, $ivaProductos, $descuentoProductos, $valorProductos, $observacion, $editadopor)) {
                        echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel blue darken-3">
                                    <span class="white-text"><i class="material-icons">add</i> Se ha registrado con éxito la orden</span>
                                </div>
                            </div>
                        </div>   ';
                    }else{
                        echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel red darken-3">
                                    <span class="white-text center-align"><i class="material-icons small">error</i> No se ha podido registrar la orden, reintente</span>
                                </div>
                            </div>
                        </div>    
                        
                        ';
                    }
                    
                    $ordentrabajo->insertExtrasOrdenT($codOrden, $combustible, $radio, $encendedor, $cAlarma, $antena, $tSeguridad, $tGasolina, $repuestollanta, $gata, $ruedasllave);
                    $ordentrabajo->insertFormaPagoOrdenT($codOrden, $cheque, $tcredito, $efectivo, $credito);
                    
                    if (isset($_POST['hidden_txt_CodLlantas'])) {
                        //REGISTRO EN LA MOV_llantassort
                      
                        $array_codLlantas = $_POST['hidden_txt_CodLlantas'];
                        $array_cantLlantas = $_POST['txt_cantidadLlantas'];
                        $array_precioLlantas = $_POST['txt_valorLlantas'];


                        for ($cont=0; $cont < sizeof($array_codLlantas);$cont++) {
                            
                            $ordentrabajo->insertLlantasOrdenT($codOrden, $codOrden.$array_codLlantas[$cont],$array_codLlantas[$cont], $array_cantLlantas[$cont], $array_precioLlantas[$cont]);
                           
                        }
                        echo "
                         <script>
                            console.log('Llantas actualizadas/Añadidas:".count($array_precioLlantas)."');
                         </script>
                         ";
                    }
                    
                    
                    if (isset($_POST['txt_cod_product']) && isset($_POST['txt_detalle_product']) && isset($_POST['txt_cant_product'])) {
                        $array_cod = $_POST['txt_cod_product'];
                        $array_detalle = $_POST['txt_detalle_product'];
                        $array_cant = $_POST['txt_cant_product'];
                        $array_precio = $_POST['txt_precio_product'];


                        for ($cont=0; $cont < sizeof($array_cod);$cont++) {
                            //echo "</br>".$array_cod[$cont].$array_cant[$cont].$array_precio[$cont];
                            if ($array_cod[$cont] != '' && $array_cod[$cont] != '-' ) {
                                 $ordentrabajo->insertMovOrdenT($codOrden, $codOrden.$array_cod[$cont], $array_cod[$cont], $array_cant[$cont], $array_precio[$cont]);
                            }
                           
                            
                        }
                        echo "
                            <script>
                            console.log('Llantas actualizadas/Añadidas:".count($array_cod)."');
                            </script>
                            ";
                             
                        
                    }
                    
                    
                    
                    
                  
                   
                     
        }else{
            echo '';
        }
    }
    
    
    public function updateOrdenTrabajo(){
        
                    $ordentrabajo = new \models\OrdentModel();
                    $codOrden =  $_GET['codOrden']; 
                    $codAsesor = $_POST['seleccion_asesor'];
                    $codMecánico = $_POST['seleccion_mecanico'];
                    $codCliente = $_POST['txt_ci_ruc'];
                    $fecha = date ("Y-n-d"); 
                    $placaAuto = $_POST['seleccion_vehiculo'];
                    $kilomet = $_POST['txt_kilometraje'];
                    $ivaLlantas = $_POST['txt_iva_llantas'];
                    $descuentoLlantas = $_POST['txt_descuento_llantas'];
                    $valorLlantas = $_POST['txt_apagar_llantas'];
                    $ivaProductos = $_POST['txt_iva_productos'];
                    $descuentoProductos = $_POST['txt_descuento_productos'];
                    $valorProductos = $_POST['txt_apagar_productos'];
                    $observacion = $_POST['texta_observacion'];
        
                    if (isset($_SESSION['rucActivo'])){
                        $editadopor = $_SESSION['rucActivo'];
                    }else{
                        $editadopor='';
                    }
                    
                    // Formas de Pago
                    
                    if (!isset($_POST['chk_cheque'])){
                        $cheque = 0;
                    }else{
                        $cheque = 1;
                    }
                    
                    if (!isset($_POST['chk_tarjetaCredito'])){
                        $tcredito = 0;
                    }else{
                        $tcredito = 1;
                    }
                    
                    if (!isset($_POST['chk_efectivo'])){
                        $efectivo = 0;
                    }else{
                        $efectivo = 1;
                    }
                    
                    if (!isset($_POST['chk_credito'])){
                        $credito = 0;
                    }else{
                        $credito = 1;
                    }
                    

                    //REGISTRO EN LA BASE DE DATOS 
                    
                    if ($ordentrabajo->updateOrdenT($codOrden, $codAsesor, $codMecánico, $codCliente, $fecha, $placaAuto, $kilomet, $ivaLlantas, $descuentoLlantas, $valorLlantas, $ivaProductos, $descuentoProductos, $valorProductos, $observacion, $editadopor)) {
                        echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel blue darken-3">
                                    <span class="white-text"><i class="material-icons">add</i> Se ha actualizado con éxito la orden</span>
                                </div>
                            </div>
                        </div>    
                        
                        ';
                        
                    }else{
                        echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel red darken-3">
                                    <span class="white-text center-align">   <i class="material-icons small">error</i> No se ha podido actualizar la orden, reintente</span>
                                </div>
                            </div>
                        </div>    
                        
                        ';
                    }
                    
                    $ordentrabajo->updateFormaPagoOrdenT($codOrden, $cheque, $tcredito, $efectivo, $credito);
                    

                    $numdoc=1; // Dirige numero de archivo doc
                    $count=0; // Dirige array
                  
                        $array_files = $_FILES['input_imagenes']['name']; // Obtenemos array de elementos html

                        foreach ($array_files as $file) 
                        {
                            if (!empty($file)){ // Comprobamos que elemento no este vacio
                                $newname = "$codOrden"."_".$numdoc.".jpg"; // Asignamos nombre referencial
                                if(move_uploaded_file($_FILES['input_imagenes']['tmp_name'][$count], SITE_ROOTSIMPLE.$newname)){ 
                                } 
                                else{
                                   echo "No se ha cargado el archivo (limite excedido): ".$newname;
                                  
                                }

                                $numdoc++;
                                $count++;
                            } 
                        } 

                      
                  
                    if (isset($_POST['hidden_txt_CodLlantas'])) {
                        //REGISTRO EN LA MOV_llantassort
                      
                        $array_codLlantas = $_POST['hidden_txt_CodLlantas'];
                        $array_cantLlantas = $_POST['txt_cantidadLlantas'];
                        $array_precioLlantas = $_POST['txt_valorLlantas'];


                        for ($cont=0; $cont < sizeof($array_codLlantas);$cont++) {
                            
                            $ordentrabajo->insertLlantasOrdenT($codOrden, $codOrden.$array_codLlantas[$cont],$array_codLlantas[$cont], $array_cantLlantas[$cont], $array_precioLlantas[$cont]);
                           
                        }
                        echo "
                        <script>
                           console.log('Llantas actualizadas/Añadidas:".count($array_precioLlantas)."');
                        </script>
                        ";
                    }
                    
                 
                    if (isset($_POST['txt_cod_product']) && isset($_POST['txt_cant_product'])) {
                        $array_cod = $_POST['txt_cod_product'];
                       
                        $array_cant = $_POST['txt_cant_product'];
                        $array_precio = $_POST['txt_precio_product'];


                        for ($cont=0; $cont < sizeof($array_cod);$cont++) {
                           
                            if ($array_cod[$cont] != '' && $array_cod[$cont] != '-' ) {
                                 $ordentrabajo->insertMovOrdenT($codOrden, $codOrden.$array_cod[$cont],$array_cod[$cont], $array_cant[$cont], $array_precio[$cont]);
                            }
                           
                            
                        }
                            
                        echo "
                        <script>
                           console.log('Llantas actualizadas/Añadidas:".count($array_cod)."');
                        </script>
                        ";   
                        
                    } 
                    
                    //header("Location: index.php?&action=inicio");    
                    
                     
    }
}
