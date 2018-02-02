<?php 
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('ordenTrabajo');

    $ordentrabajo = new models\OrdentModel();
    $maincontroller = new controllers\mainController();
    $maincontroller->registrarOrdenTrabajo();
?>

<div class="container">
    <!-- Card de registro de productos -->
    <div class="row">
          <div class="col s12 m12">
            <div class="card z-depth-2">
              <div class="card-content">
                <span class="card-title center-align"><h5>Nueva Orden de Trabajo</h5></span>
                <form action="" method="POST" name="ordenTrabajo" autocomplete="off"  enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5>Información Principal</h5>
                                <div class="input-field col s12 m6 l6">
                                <select name="seleccion_asesor" id="seleccion_asesor" required>
                                    <option value="" disabled selected>Seleccione por favor:</option>
                                    <?PHP
                                        $ordentrabajo->getAsesores();
                                    ?>
                                </select>
                                <label>Indique un asesor: (Campo Obligatorio)</label>
                                </div>

                                <div class="input-field col s12 m6 l6">
                                <select name="seleccion_mecanico" id="seleccion_mecanico" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <?PHP
                                        $ordentrabajo->getMecanicos();
                                    ?>
                                </select>
                                <label>Indique un mecánico: (Campo Obligatorio)</label>
                                </div>
                            </div>    


                            <div class="col">
                                <h5>Información del Propietario</h5>
                                <!-- Fila 1-->

                                <div class="input-field col s12 m6 l6">
                                    <input class="mayusculas" name="txt_ci_ruc" id="txt_ci_ruc" type="text" data-length="13" onkeyup="ajax_jsonDatosCliente();ajax_getVehiculos()"required  autofocus>
                                    <label for="txt_ci_ruc" data-error="No cumple" >RUC</label>
                                </div>

                                <div class="input-field col s12 m6 l6">
                                    <input id="txt_cliente" type="text" data-length="13" value="(Sin identificar)" disabled>
                                    <label for="txt_cliente" data-error="No cumple" >Cliente Identificado</label>
                                </div>

                                <!-- Fila 2-->

                                <div class="input-field col s12 m6 l4">
                                    <input type="text" name="txt_direccion" id="txt_direccion" value="(Sin identificar)" disabled>
                                    <label for="txt_direccion" data-error="No cumple" >Dirección</label>
                                </div>

                                <div class="input-field col s12 m6 l4">
                                    <input type="text" name="txt_telefono" id="txt_telefono" value="(Sin identificar)" disabled>
                                    <label for="txt_telefono" data-error="No cumple" >Teléfono</label>
                                </div>

                                <div class="input-field col s12 m6 l4">
                                    <input type="text" name="txt_correo" id="txt_correo" value="(Sin identificar)" disabled>
                                    <label for="txt_correo" data-error="No cumple" >E-mail</label>
                                </div>

                                <!-- Fila 3-->

                                <div class="input-field col s12 m6 l9">
                                    <select name="seleccion_vehiculo" id="seleccion_vehiculo" required>
                                    <option value="" disabled selected>Seleccione por favor</option>
                                    <?PHP
                                        
                                    ?>
                                    </select>
                                    <label>Indique un vehiculo: (Campo Obligatorio)</label>
                                    
                                    
                                </div>

                                <div class="input-field col s12 m12 l3">
                                    <input type="number" name="txt_kilometraje" data-length="7" maxlength="7" id="txt_kilometraje" required>
                                    <label for="txt_kilometraje" data-error="No cumple" >Kilometraje</label>
                                </div>
                            </div>

                            <div class="col">
                                <h5>Extras del Vehiculo</h5>

                                <div class="range-field col-lg-12">
                                    <label for="range_combustible" class="text-center">Combustible</label>
                                    <input type="range" name="range_combustible" id="range_combustible" min="0" max="100" />
                                </div>

                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_radio" id="chk_radio" value="1"/>
                                    <label for="chk_radio">Radio</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_encendedor" id="chk_encendedor" value="1"/>
                                    <label for="chk_encendedor">Encendedor</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_controlAlarma" id="chk_controlAlarma" value="1"/>
                                    <label for="chk_controlAlarma">Control Alarma</label>
                                </div>


                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_antena" id="chk_antena" value="1"/>
                                    <label for="chk_antena">Antena</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_tuercaSeguridad" id="chk_tuercaSeguridad" value="1"/>
                                    <label for="chk_tuercaSeguridad">Tuerca de Seguridad</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_tapaGasolina" id="chk_tapaGasolina" value="1"/>
                                    <label for="chk_tapaGasolina">Tapa de Gasolina</label>
                                </div>

                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_llantaRepuesto" id="chk_llantaRepuesto" value="1"/>
                                    <label for="chk_llantaRepuesto">Llanta Repuesto</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_gata" id="chk_gata" value="1"/>
                                    <label for="chk_gata">Gata</label>
                                </div>
                                <div class="col s12 m6 l4">
                                    <input type="checkbox" class="filled-in" name="chk_llaveRuedas" id="chk_llaveRuedas" value="1"/>
                                    <label for="chk_llaveRuedas">Llave de Ruedas</label>
                                </div>
                                
                            </div>     
                            
                            
                            
                            <div class="col s12 m12 l12">
                                <h5>Evidencia de Estado</h5>
                                <div class="file-field input-field">
                                    <div class="btn">
                                      <span>Fotografia</span>
                                      <input type="file" name="input_imagenes[]" id="input_imagenes"  accept="image/*" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" placeholder="Maximo 10Mb">
                                    </div>
                                 </div>
                            </div>
                            
                            <div class="col s12 m12 l12">
                                <h5>Neumaticos: </h5>
                                
                                <div class="input-field col s12 m12 l2">
                                    <select name="seleccion_marcaLlanta[]" class="rowllantas" id="seleccion_marcaLlanta" onchange="ajax_getModelosLlantas(this)">
                                    <option value="" disabled selected>Seleccione:</option>
                                    <?PHP
                                        $ordentrabajo->getMarcasLlntas();
                                    ?>
                                    </select>
                                    <label>Marca: </label>
                                </div>
                                
                                <div class="input-field col s12 m6 l3">
                                    <select name="seleccion_modeloLlanta[]" id="seleccion_modeloLlanta" onchange="ajax_getMedidasLlantas(this)">
                                    <option value="" disabled selected>Seleccione por favor:</option>
                                   
                                    </select>
                                    <label>Modelo: </label>
                                </div>
                                
                                <div class="input-field col s12 m6 l3">
                                    <select name="seleccion_medidaLlanta[]" id="seleccion_medidaLlanta" onchange="ajax_getValorLlantas(this)">
                                    <option value="" disabled selected>Seleccione por favor:</option>
                                    
                                    </select>
                                    <label>Medida: </label>
                                </div>

                                <div class="input-field col s12 m6 l1">
                                    <input type="number" name="txt_cantidadLlantas[]" id="txt_cantidadLlantas" class="center-align rowcantidadLlantas" value="0" onclick="extra_llanta(this);calcular_total_llantas()" onkeyup="extra_llanta(this);calcular_total_llantas()">
                                    <label for="txt_cantidadLlantas" data-error="No cumple">Cantidad</label>
                                </div>

                                <div class="input-field col s12 m6 l2">
                                    <input type="number" step="0.01" class="importe_linea_llanta center-align" name="txt_valorLlantas[]" id="txt_valorLlantas" value="0" onkeyup="calcular_total_llantas()" onclick="calcular_total_llantas()">
                                    <input type="hidden" name="hidden_txt_CodLlantas[]">
                                    <input type="hidden" name="hidden_txt_valorLlantas[]">
                                    <label for="txt_valorLlantas" data-error="No cumple">Valor</label>
                                </div>
                                
                            </div>  
                            
                            <!-- Contenedor de Controles ajax-->
                                
                            <div class="result_addLlantas"> 
                            </div>
                            
                            
                            <div class="col">
                                <h5>Valores a cancelar por neumáticos:</h5>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Subtotal</label>
                                    <input type="text" class="center-align" id="txt_subtotal_llantas" name="txt_subtotal_llantas" value="0" onkeyup="calcular_total_llantas()" readonly>
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">IVA</label>
                                    <input type="text" class="center-align" id="txt_iva_llantas" name="txt_iva_llantas" value="0" onkeyup="calcular_total_llantas()" readonly>
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Total</label>
                                    <input type="text" class="center-align" id="txt_total_llantas" name="txt_total_llantas" value="0" onkeyup="calcular_total_llantas()" readonly>
                                </div>
                                
                                 <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Descuento (%)</label>
                                    <input type="number" class="center-align subtotales" id="txt_descuento_llantas"  name="txt_descuento_llantas" min="0" max="100" value="0" onclick="calcular_total_llantas()" onchange="calcular_total_llantas()" onkeyup="calcular_total_llantas()">
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">A pagar por llantas</label>
                                    <input type="text" class="center-align subtotales" id="txt_apagar_llantas"  name="txt_apagar_llantas" value="0" readonly required="true">
                                </div>
                            </div>  
                            
                            
                            <div class="col s12 m12 l12">
                                <h5>Producto: </h5>
                                <div class="input-field col s12 m3 l2">
                                    <input type="text" class="center-align" name="txt_cod_product[]" value="-" readonly>
                                    <label for="txt_cod_product" class="label">Código</label>
                                </div>    
                                       
                                <div class="input-field col s12 m6 l5">
                                    <input type="text" id="testinput1" class="autocomplete center-align uppercase rowproducto" name="txt_detalle_product[]" placeholder="Indique item" onchange="ajaxvalidacod_producto(this);calcular_total_productos()">
                                    <label for="txt_detalle_product" class="label">Producto</label>
                                </div>

                                <div class="input-field col s12 m3 l2">
                                    <input type="number" class="center-align rowcantidad" name="txt_cant_product[]" value="0" onclick="extra_prod(this);calcular_total_productos()" onkeyup="extra_prod(this);calcular_total_productos()" min="0" max="99"  required>
                                    <label class="label">Cantidad</label>
                                </div>

                                <div class="input-field col s12 m12 l2">
                                    <label class="label">Precio</label>
                                    <input type="text" class="center-align importe_linea_producto" name="txt_precio_product[]" value="0" onkeyup="calcular_total_productos()">
                                    <input type="hidden" name="hidden_precio_product[]">
                                </div>
                                
                            </div>    
                            
                            <!-- Contenedor de Controles ajax-->
                                
                            <div class="result_add"> 
                            </div>
                            
                            
                            
                            <div class="col">
                                <h5>Valores a cancelar por productos y servicios: </h5>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Subtotal</label>
                                    <input type="text" class="center-align" id="txt_subtotal_productos" name="txt_subtotal_productos" value="0" onkeyup="calcular_total_productos()" readonly>
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">IVA</label>
                                    <input type="text" class="center-align" id="txt_iva_productos" name="txt_iva_productos" value="0" onkeyup="calcular_total_productos()" readonly>
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Total</label>
                                    <input type="text" class="center-align" id="txt_total_productos" name="txt_total_productos" value="0" onkeyup="calcular_total_productos()" readonly>
                                </div>
                                
                                 <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">Descuento</label>
                                    <input type="number" class="center-align subtotales" id="txt_descuento_productos"  name="txt_descuento_productos" min="0" max="100" value="0" onclick="calcular_total_productos()" onchange="calcular_total_productos()" onkeyup="calcular_total_productos()">
                                </div>
                                
                                <div class="input-field col s12 l4 offset-l7">
                                    <label class="label">A pagar por productos & servicios</label>
                                    <input type="text" class="center-align subtotales" id="txt_apagar_productos"  name="txt_apagar_productos" value="0" readonly required="true">
                                </div>
                            </div>  
                            
                            
                            <div class="col s12 m12 l12">
                                <h5>Forma de Pago</h5>

                                <div class="col s12 m3 l3">
                                    <input type="checkbox" class="filled-in" name="chk_efectivo" id="chk_efectivo" onclick="calcular_total_productos();calcular_total_llantas();mensajeRecargo()" value="1"/>
                                    <label for="chk_efectivo">Efectivo</label>
                                </div>
                                <div class="col s12 m3 l3">
                                    <input type="checkbox" class="filled-in" name="chk_cheque" id="chk_cheque" onclick="calcular_total_productos();calcular_total_llantas();mensajeRecargo()"value="1"/>
                                    <label for="chk_cheque">Cheque</label>
                                </div>
                                
                                <div class="col s12 m3 l3">
                                    <input type="checkbox" class="filled-in" name="chk_tarjetaCredito" id="chk_tarjetaCredito" onclick="calcular_total_productos();calcular_total_llantas();mensajeRecargo()" value="1"/>
                                    <label for="chk_tarjetaCredito">Tarjeta de Credito</label>
                                </div>
                                
                                <div class="col s12 m3 l3">
                                    <input type="checkbox" class="filled-in" name="chk_credito" id="chk_credito" onclick="calcular_total_productos();calcular_total_llantas();mensajeRecargo()" value="1"/>
                                    <label for="chk_credito">Credito</label>
                                </div>

                                
                            </div>
                            
                            <div class="col s12 m12 l12">
                              <div class="row">
                                <div class="input-field col s12">
                                  <textarea id="texta_observacion" name="texta_observacion" class="materialize-textarea" data-length="100"></textarea>
                                  <label for="textarea1">Comentarios u observaciones</label>
                                </div>
                              </div>
                           
                          </div>
                            
                            
                            <div class="input-field col s12 m12 center">
                              <input type="submit" class="btn" name="action" value="Registrar">
                            </div>
                            
                        </div><!-- End row -->
                        
                            

                </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
        
    
     <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Nuevo Cliente</h4>
        <form method="GET" id="registrar_ClienteModal" name="registrar_ClienteModal" target="_blank" class="form-inline">
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-12">
                                        <br>
                                        <input type="text" class="form-control centertext uppercase" id="ruc_modal" maxlength="13" placeholder="Cédula o RUC" required><br>
                                        <br>
                                        <input type="text" class="form-control centertext uppercase" id="clientename_modal" maxlength="40" placeholder="Nombres y Apellidos" required><br>
                                        <br>
                                        <input type="text" class="form-control centertext uppercase" id="direccion_modal" maxlength="40" placeholder="Dirección" required><br>
                                        <br>
                                        <input type="text" class="form-control centertext uppercase" id="telefono_modal" maxlength="40" placeholder="Teléfono" required><br>
                                        <br>
                                        <input type="email" class="form-control centertext" id="correo_modal" maxlength="40" placeholder="Correo" required><br>
                                        <br>
                                        <div class="row rowspace">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" onclick="registrarCliente()"><span class="glyphicon glyphicon-thumbs-up"></span> Registrar Cliente</button>
                                                <button type="button" class="btn btn-default" onclick="resetForm('registrar_ClienteModal')"><span class="glyphicon glyphicon-new-window"></span> Nuevo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
        </form>
      </div>
      <div class="modal-footer">
        <a href="#!" class="btn modal-action modal-close">Cerrar</a>
      </div>
    </div>
     
    <!-- Floating Button Google-->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating blue" id="btn_add_producto" onclick="add_row_llantas()" title="Agregar Llantas"><i class="material-icons">directions_car</i></a></li>
            <li><a class="btn-floating green" id="btn_add_producto" onclick="add_row()" title="Agregar Producto"><i class="material-icons">card_travel</i></a></li>
            <li><a class="btn-floating gray-bg" id="btn_add_producto" onclick="" title="Test Function"><i class="material-icons">bug_report</i></a></li>
            
        </ul>
    </div>
        
</div>    
        