<?php 
    $licencia = new controllers\licenciaController();
    $licencia->enableSegurity('reportes');   
     
    $ordentclass = new models\OrdentModel();    
?>

<div class="container">
    
        <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Registros de Venta de LLantas</h5></span>
                
                    <div class="row">
                             <div class="input-field col s12 m9 l10">
                                    <select name="seleccion_marcaLlanta" id="seleccion_marcaLlanta">
                                    <option value="" disabled selected>Seleccione marca de llanta</option>
                                    <?PHP
                                        $ordentclass->getMarcasLlntas();
                                    ?>
                                    </select>
                                    <label>Marca: </label>
                            </div>
                       
                            <div class="input-field col s12 m3 l2">
                                <button class="btn waves-effect waves-light" type="button" onclick="ajax_searchLlantasByCI()">Buscar</button>
                            </div>
                        
                            <div class="input-field col s6 m6 l6">
                                <input id="txt_fechaINI" type="text" class="datepicker">
                                <label for="txt_fechaINI" data-error="No cumple" >Fecha de Inicio</label>
                            </div>
                        
                            <div class="input-field col s16 m6 l6">
                                <input id="txt_fechaFIN" type="text" class="datepicker">
                                <label for="txt_fechaFIN" data-error="No cumple" >Fecha Final</label>
                            </div>
                    </div>
                    <form autocomplete="off">
                        <div class="row" class="containerajax" id="containerajax">
                            
                            <table class="striped centered responsive-table">
                                <thead>
                                  <tr>
                                      <th>Orden #</th>
                                      <th>CI (Empleado)</th>
                                      <th>Empleado</th>
                                      <th>Neumatico</th>
                                      <th>Cantidad</th>
                                      <th>Fecha</th>
                                      
                                  </tr>
                                </thead>
                                
                                <tbody>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
  
</div>    
        