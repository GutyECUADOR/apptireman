<?php
session_start();
require_once '../../../core/models/OrdentModel.php';
$ordentrabajo = new \models\OrdentModel();


$cedula = $_POST['cedula'];
$fechaINI = $_POST['fechaINI'];
$fechaFIN = $_POST['fechaFIN'];


if (isset($cedula) and $cedula!=''){
   
        $totalOrdenes = $ordentrabajo->getSearchTrabajosPendientesMecanicos($cedula, $fechaINI, $fechaFIN);
        
        if(!empty($totalOrdenes)){
            foreach ($totalOrdenes as $row) {
       
                $rutaIMG = "./core/resources/evidenciaEstado/ev".$row['codOrden']."_1.jpg";
                    
                echo '
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">';
                        echo '<span class="card-title">'.$row['codOrden'].'</span>';
                             $rutaIMG = "../../../core/resources/evidenciaEstado/ev".$row['codOrden']."_1.jpg";
                            if(file_exists($rutaIMG)){
                                $rutaIMG = "./core/resources/evidenciaEstado/ev".$row['codOrden']."_1.jpg";
                                echo '<img src="'.$rutaIMG.'">';
                            }else{
                                echo '<img src="./core/resources/draweable/imges/logo.jpg">';
                            }
                       
        
                echo '  </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Vehiculo: '.$row['automovil'].'<i class="material-icons right">more_vert</i></span>
                            <p>Propiedad de: '.$row['clienteN'].'.</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Trabajos a realizar<i class="material-icons right">close</i></span>
                            ';
        
                            foreach($ordentrabajo->getDetalleTrabajosPendientesMecanicos($row['codOrden']) as $rowdetalle){
                                echo '<li>'.$rowdetalle['detalle'].'</li>';
                            }
                echo '</div>
                    </div>
                </div>
                    ';
                }
        }else{
            echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel red darken-3">
                                    <span class="white-text center-align"><i class="material-icons small">error</i> No se encontraron resultados.</span>
                                </div>
                            </div>
                        </div>    
            ';
        }
        
                      
}else{
    echo '
        <div class="row">
            <div class="col s6 offset-s3">
                <div class="card-panel red darken-3">
                    <span class="white-text center-align"><i class="material-icons small">error</i> Campos necesarios vacios.</span>
                </div>
            </div>
        </div>    
    
    
    ';
}

