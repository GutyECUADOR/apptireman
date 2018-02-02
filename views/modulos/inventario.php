<?php 
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('inventario');   
     
    $ordentclass = new models\OrdentModel();    
?>

<div class="nav-content teal darken-2">
    <ul class="tabs-swipe-demo tabs tabs-transparent">
        <li class="tab"><a class="active waves-effect"href="#inventarioproductos">Inventario de Productos</a></li>
        <li class="tab"><a href="#inventariollantas">Inventario de Llantas</a></li>
    </ul>
</div>


<div class="container">
    <!-- Card de registro de productos -->
    <div id="inventarioproductos">
        <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Productos en Bodega</h5></span>
                    <form autocomplete="off">
                        <div class="row">
                            
                            <table class="striped centered responsive-table">
                                <thead>
                                  <tr>
                                      <th>Codigo</th>
                                      <th>Producto</th>
                                      <th>Existencias</th>
                                      <th>Valor</th>
                                  </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ordentclass->getInventarioProductos() as $row) {?>
                                    <tr>
                                      <td><?php echo $row['cod_prod'] ?></td>
                                      <td><?php echo $row['detalle'] ?></td>
                                      <td><?php echo $row['cantidad'] ?></td>
                                      <td><?php echo $row['valor'] ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
    </div>  
    
    <!-- Card de registro de productos -->
    <div id="inventariollantas">
        <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Llantas en Bodega</h5></span>
                    <form autocomplete="off">
                        <div class="row">
                            
                            <table class="striped centered responsive-table">
                                <thead>
                                  <tr>
                                      <th>Codigo</th>
                                      <th>Neumatico</th>
                                      <th>Marca</th>
                                      <th>Medida</th>
                                      <th>Cantidad</th>
                                      <th>Valor</th>
                                  </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ordentclass->getInventarioLlantas() as $row) {?>
                                    <tr>
                                      <td><?php echo $row['cod_llanta'] ?></td>
                                      <td><?php echo $row['detalle'] ?></td>
                                      <td><?php echo $row['marca'] ?></td>
                                      <td><?php echo $row['medida'] ?></td>
                                      <td><?php echo $row['cantidad'] ?></td>
                                      <td><?php echo $row['valor'] ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
    </div>  
</div>    
        