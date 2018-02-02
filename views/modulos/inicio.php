<?php
$ordentclass = new models\OrdentModel();
$licencia = new controllers\licenciaController();
$licencia->enableSegurity('inicio');

?>

<?php include_once 'views/modulos/navtabs.php';?>

<!-- Contenido de tab 1-->
        <div class="container spa">
            <div id="ultimasventas">
            <div class="row">
                <?php foreach ($ordentclass->getTOP10ordenesT() as $row) {?>
                <div class="col s12 m4 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <?php
                                $rutaIMG = "./core/resources/evidenciaEstado/ev".$row['codOrden']."_1.jpg";
                                if(file_exists($rutaIMG)){
                                    echo '<img src="'.$rutaIMG.'">';
                                }else{
                                    echo '<img src="./core/resources/draweable/imges/logo.jpg">';
                                }
                            ?>
                            
                        </div>
                        
                      
                        
                            <div class="card-content">
                                <p><b><?php echo $row['codOrden'];
                                        if ($row['estado'] == 1){
                                            echo '(Anulada)';
                                        }
                                        ?></b></span>
                                <p>RUC: <?php echo $row['cliente'] ?></p>
                                <p>$ Llantas: $<?php echo $row['valorLlantas'] ?></p>
                                <p>$ Productos: $<?php echo $row['valorProductos'] ?></p>
                                <p>Fecha: <?php echo $row['fecha'] ?></p>
                                
                            </div>
                            <div class="card-action center-align">
                                <a href="#" id="<?php echo $row['codOrden'] ?>" onclick="fn_genreport(this)">Revisar</a>
                            </div>
                        
                    </div>
                </div>
                <?php }?>
                
            </div> 
               
            <!-- Floating Button -->
                <div class="fixed-action-btn horizontal">
                    <a class="btn-floating btn-large red waves-effect waves-light" href="?action=ordenTrabajo">
                      <i class="large material-icons">shopping_cart</i>
                    </a>
                </div>
            </div> <!-- Fin del tab-->
        </div>


<!-- Contenido de tab 2-->
        <div class="spa">
            <div id="ultimasventasLista">
                <div class="row">
                    <div class="col s12 m12">
                    <div class="card">
                      <div class="card-content">
                        <span class="card-title center-align"><h5>Ordenes de Trabajo</h5></span>
                            <form autocomplete="off">
                                <div class="row responsibetable">

                                    <table class="striped centered">
                                        <thead>
                                          <tr>
                                              <th>Codigo</th>
                                              <th>Asesor</th>
                                              <th>Mecanico</th>
                                              <th>Cliente</th>
                                              <th>Fecha</th>
                                              <th>Vehiculo</th>
                                              <th>LLantas</th>
                                              <th>Productos</th>
                                          </tr>
                                        </thead>
                                            <tbody>
                                            

                                                <?php foreach ($ordentclass->getTOP100ordenesT() as $row) {?>
                                                <tr>
                                                  <td><?php echo $row['codOrden'] ?></td>
                                                  <td><?php echo $row['empleado'] ?></td>
                                                  <td><?php echo $row['empleadoN'] ?></td>
                                                  <td><?php echo $row['clienteN'] ?></td>
                                                  <td><?php echo $row['fecha'] ?></td>
                                                  <td><?php echo $row['automovil'] ?></td>
                                                  <td><?php echo $row['valorLlantas'] ?></td>
                                                  <td><?php echo $row['valorProductos'] ?></td>
                                                  
                                                  <?php 
                                                   if (isset($_SESSION["lv_acceso"]) && $_SESSION["lv_acceso"] >= LV_ACCESO_EDITORT){
                                                  ?>
                                                   <!-- Dropdown Trigger -->
                                                   <td><a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $row['codOrden']?>'>Acciones</a></td>

                                                    <!-- Dropdown Structure -->
                                                    <ul id='dropdown<?php echo $row['codOrden']?>' class='dropdown-content'>
                                                      <li><a href="#!" id="<?php echo $row['codOrden']?>" onclick="fn_genreport(this)">Revisar</a></li>
                                                      <li><a href="?action=editaOrden&codOrden=<?php echo $row['codOrden']?>" id="<?php echo $row['codOrden']?>" >Editar</a></li>
                                                      <li><a href="#!" id="<?php echo $row['codOrden']?>" onclick="anularOrdenT(this)">Anular</a></li>
                                                     
                                                    </ul>
                                                  <?php
                                                    }else{ 
                                                  ?>
                                                  <td><a href="#" id="<?php echo $row['codOrden'] ?>" onclick="fn_genreport(this)">Revisar</a></td>
                                                  <?php 
                                                    }      
                                                   ?>
                                                  </tr>
                                                <?php }?>
                                            </tbody> 
                                            
                                        </div>
                                        
                                        
                                    </table>

                                </div>
                            </form>
                      </div>
                    </div>
                  </div>
        </div><!-- End of Sign Up Card row -->
            
            </div> <!-- Fin del tab-->
        </div>
        
        
<!-- Contenido de tab 3-->
<div class="spa">
    <div id="busquedaLista">
        <div class="row">
            <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Busqueda de Ordenes de Trabajo</h5></span>
                    <form autocomplete="off">
                        <div class="row">

                            <div class="row">
                                <div class="input-field col s12 m9 l10">
                                   <input id="txt_busqueda" type="number">
                                   <label for="txt_busqueda" data-error="No cumple" >Cédula de Cliente</label>
                               </div>

                               <div class="input-field col s12 m3 l2 center-align">
                                   <button class="btn waves-effect waves-light" type="button" onclick="ajax_searchOrdenesTrabajo()">Buscar</button>
                               </div>

                               <div class="input-field col s12 m6 l6">
                                   <input id="txt_fechaINI" type="text" class="datepicker">
                                   <label for="txt_fechaINI" data-error="No cumple" >Fecha de Inicio</label>
                               </div>

                               <div class="input-field col s12 m6 l6">
                                   <input id="txt_fechaFIN" type="text" class="datepicker">
                                   <label for="txt_fechaFIN" data-error="No cumple" >Fecha Final</label>
                               </div>
                            </div>

                            <div class="containerajax responsibetable" id="containerajax">

                            </div>
                            
                            
                        </div>
                    </form>
              </div>
            </div>
          </div>
    </div><!-- End of Sign Up Card row -->

    </div> <!-- Fin del tab-->
</div>

