<?php
require_once '../../../core/models/OrdentModel.php';
$ordentrabajo = new \models\OrdentModel();


$marca = $_POST['marca'];
$fechaINI = $_POST['fechaINI'];
$fechaFIN = $_POST['fechaFIN'];



if (isset($marca) and $marca!=''){
       
        echo '<table class="striped centered responsive-table">
            <thead>
              <tr>
                  <th>Orden #</th>
                  <th>Asesor</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Medida</th>
                  <th>Fecha</th>
                  <th>Cant.</th>
                  <th>Valor Vendido</th>
                  <th>F.Pago</th>

              </tr>
            </thead>';
                
                foreach ($ordentrabajo->getSearchLlantasByMarca($marca, $fechaINI, $fechaFIN) as $row) {

                echo '<tr>';

                echo '<td>'.$row['codOrden'].'</td>';
                echo '<td>'.$row['empleado'].'</td>';
                echo '<td>'.$row['marcaLlanta'].'</td>';
                echo '<td>'.$row['modeloLlanta'].'</td>';
                echo '<td>'.$row['medidaLlanta'].'</td>';
                echo '<td>'.$row['fecha'].'</td>';
                echo '<td>'.$row['cantLlanta'].'</td>';
                echo '<td>'.$row['valorLlanta'].'</td>';
                echo '<td>';
                
                if($row['efectivo']){
                    echo "Efectivo, ";
                }
                
                if($row['cheque']){
                    echo "Cheque, ";
                }
                 
                if($row['tcredito']){
                    echo "T. Credito, ";
                }
                
                if($row['credito']){
                    echo "Credito, ";
                }

                echo '</td>';
                
                
                
                echo '</tr>';
                }

            echo '</tbody>';                            
        echo  '</table>' ;                          
}else{
    echo '
        <div class="card-panel red darken-3 center-align">
             <span class="white-text center-align"><i class="material-icons small">error</i> Campos vacios.</span>
        </div>
    
    ';
}

