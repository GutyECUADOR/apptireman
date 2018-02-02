<?php
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('agregarVehiculo');  

    $ordentrabajo = new models\OrdentModel();    
?>


<div class="container">
    <!-- Card de registro de productos -->
    <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Registro y Asignación de Vehiculo</h5></span>
                    <form class="container" autocomplete="off" id="registrar_Vehiculo" name="registrar_Vehiculo">
                        <div class="row">

                            <div class="input-field col s12 m12 l12">
                                <select name="seleccion_cliente" id="seleccion_cliente" size="3" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <?PHP
                                        $ordentrabajo->getClientes();
                                    ?>
                                </select>
                                <label>Indique un cliente:</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <select name="seleccion_marcaauto" id="seleccion_marcaauto" onchange="ajax_getModelos()" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <?PHP
                                        $ordentrabajo->getMarcasAutos();
                                    ?>
                                </select>
                               <label>Indique una marca:</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l6">
                                <select name="seleccion_modeloauto" id="seleccion_modeloauto" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                </select>
                                <label>Indique un modelo:</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l4">
                                <input class="uppercase" id="placas_modal" type="text" maxlength="8" onblur="replacePLACA(this.value)">
                                <label for="placas_modal" data-error="No cumple">Placas</label>
                            </div>
                           
                            <div class="input-field col s12 m6 l4">
                                <input id="anio_modal" type="text" data-length="4" maxlength="4">
                                <label for="anio_modal" data-error="No cumple">Año</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l4">
                                <select name="seleccion_color" id="seleccion_color" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <option value="rojo" >Rojo</option>
                                    <option value="negro">Negro</option>
                                    <option value="blanco">Blanco</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <label>Indique un color:</label>
                            </div>
                            
                            <div class="input-field col s12 m12 center-align">
                                <button class="btn waves-effect waves-light" type="button" name="action" onclick="registrarAutoCliente()">
                                   Registrar <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light red darken-4" type="button" onclick="resetForm('registrar_Vehiculo')">
                                   Cancelar <i class="material-icons right"></i>
                                </button>
                            </div>

                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
</div>    
        
           
          
          
        