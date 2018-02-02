<?php
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('agregarCliente');

?>


<div class="container">
    <!-- Card de registro de productos -->
    <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Registro de Nuevo Cliente</h5></span>
                    <form class="container" autocomplete="off" id="registrar_Cliente" name="registrar_Cliente">
                        <div class="row">

                            <div class="input-field col s12 m6 l4">
                                <input type="text" class="mayusculas" id="ruc_modal"  data-length="13"  required  autofocus>
                                <label for="ruc_modal" data-error="No cumple" >Cédula / RUC</label>
                            </div>
                            <div class="input-field col s12 m6 l8">
                                <input type="text" class="mayusculas" id="clientename_modal" data-length="40" required>
                                <label for="clientename_modal" data-error="No cumple">Nombres y Apellidos</label>
                            </div>
                            
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="uppercase" id="direccion_modal" data-length="40" required>
                                <label for="direccion_modal" data-error="No cumple">Dirección</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l6">
                                <input type="text" class="uppercase" id="telefono_modal" data-length="12" required><br>
                                <label for="telefono_modal" data-error="No cumple">Teléfono</label>
                            </div>
                            
                            <div class="input-field col s12 m6 l6">
                                <input type="email" id="correo_modal" class="validate">
                                <label for="correo_modal" data-error="No cumple" data-success="Correcto">Email</label>
                            </div>
                            
                            <div class="input-field col s12 m12 center-align">
                                <button class="btn waves-effect waves-light" type="button" onclick="registrarCliente()">
                                   Registrar <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light red darken-4" type="button" onclick="resetForm('registrar_Cliente')">
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
        
           
          
          
        