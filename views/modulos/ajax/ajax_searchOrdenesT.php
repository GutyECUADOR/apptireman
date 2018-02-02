<?php
session_start();
require_once '../../../core/models/OrdentModel.php';
$ordentrabajo = new \models\OrdentModel();


$cedula = $_POST['cedula'];
$fechaINI = $_POST['fechaINI'];
$fechaFIN = $_POST['fechaFIN'];


if (isset($cedula) and $cedula!=''){
    
    echo '<table class="striped centered">
        <thead>
          <tr>
              <th>Codigo</th>
              <th>Asesor</th>
              <th>Mecanico</th>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Vehiculo</th>
              <th>LLantas</th>
              <th>Servicios</th>
          </tr>
        </thead>
        <tbody>';

        
        foreach ($ordentrabajo->getSearchOrdenTrabajo($cedula, $fechaINI, $fechaFIN) as $row) {
        echo '<tr>';
        echo '<td>'.$row['codOrden'].'</td>';
        echo '<td>'.$row['empleado'].'</td>';
        echo '<td>'.$row['empleadoN'].'</td>';
        echo '<td>'.$row['clienteN'].'</td>';
        echo '<td>'.$row['fecha'].'</td>';
        echo '<td>'.$row['automovil'].'</td>';
        echo '<td>'.$row['valorLlantas'].'</td>';
        echo '<td>'.$row['valorProductos'].'</td>';
        
            if (isset($_SESSION["lv_acceso"]) && $_SESSION["lv_acceso"] >=99){
          
            echo '
                <td><a class="dropdown-button btn" href="#" data-activates="dropdownajax'.$row['codOrden'].'">Acciones</a></td>

                <ul id="dropdownajax'.$row['codOrden'].'" class="dropdown-content">
                      <li><a href="#" id="'.$row['codOrden'].'" onclick="fn_genreport(this)">Revisar</a></li>
                      <li><a href="?action=editaOrden&codOrden='.$row['codOrden'].'" id="'.$row['codOrden'].'" >Editar</a></li>
                      <li><a href="#!" id="'.$row['codOrden'].'" onclick="anularOrdenT(this)">Anular</a></li>
                                                     
                    </ul>

                ';
            }else{ 
             
            echo "<td><a href='#' id=".$row['codOrden']." onclick='fn_genreport(this)'>Revisar</a><td>";
                                          
            }
        
        
        }
        echo '</tr>';

        echo '</tbody> 


        </div>


    </table>';
                      
}else{
    echo 'Campos de busqueda vacios';
}

