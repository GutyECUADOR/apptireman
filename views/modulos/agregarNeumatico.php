<?php
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('agregarNeumatico');
    $ordentrabajo = new models\OrdentModel();    
?>


<div class="container">
    <!-- Card de registro de productos -->
    <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Registro de Neumaticos</h5></span>
                    <form class="container" autocomplete="off" id="registrar_Neumaticos" name="registrar_Neumaticos">
                        <div class="row">

                            <div class="input-field col s12 m6 l4">
                                <input class="mayusculas" id="txt_codReferencial" type="text" data-length="6" maxlength='6' required  autofocus>
                                <label for="txt_codReferencial" data-error="No cumple" >Código Referencial</label>
                            </div>
                            <div class="input-field col s12 m6 l8">
                                <input id="txt_detalle" type="text" data-length="35">
                                <label for="txt_detalle" data-error="No cumple">Descripción del neumatico</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l7">
                                <select class="centrado" name="seleccion_marca" id="seleccion_marca" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <?PHP
                                        $ordentrabajo->getMarcasLlntas();
                                    ?>
                                </select>
                                <label>Indique un marca:</label>
                                </div>
                            
                            <div class="input-field col s12 m6 l5">
                                <input id="txt_modelo" type="text" class="uppercase" data-length="20">
                                <label for="txt_modelo" data-error="No cumple">Modelo</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l4">
                                <input id="txt_medida" type="text" class="uppercase" data-length="20">
                                <label for="txt_medida" data-error="No cumple">Medida</label>
                            </div>
                           
                            <div class="input-field col s12 m6 l4">
                                <input id="txt_cantidad" type="number">
                                <label for="txt_cantidad" data-error="No cumple">Cantidad</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l4">
                                <input id="txt_costo" type="number">
                                <label for="txt_costo" data-error="No cumple">Costo</label>
                            </div>
                            
                            <div class="input-field col s12 m12 center-align">
                                <button class="btn waves-effect waves-light" type="button" name="action" onclick="registrarNeumatico()">
                                   Registrar <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light red darken-4" type="button" onclick="resetForm('registrar_Neumaticos')">
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
        
           
          
          
        