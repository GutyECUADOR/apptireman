<?php
$ordentclass = new models\OrdentModel();
$licencia = new controllers\licenciaController();
$licencia->enableSegurity('inicio');

$utils = new controllers\utilidadesController();

?>
     
     
<!-- Contenido de tab 3-->
<div class="spa">
    <div id="busquedaLista">
        <div class="row">
            <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Buscar trabajos pendientes</h5></span>
                    <form autocomplete="off">
                        <div class="row">

                            <div class="row">
                                <div class="input-field col s12 m9 l10">
                                   <input id="txt_busqueda" type="number">
                                   <label for="txt_busqueda" data-error="No cumple" >Cédula de Mecánico</label>
                               </div>

                               <div class="input-field col s12 m3 l2 center-align">
                                   <button class="btn waves-effect waves-light" type="button" onclick="ajax_searchOrdenesMecanicos()">Buscar</button>
                               </div>

                               <div class="input-field col s12 m6 l6">
                                   <input id="txt_fechaINI" type="text" class="datepicker" value=<?php echo $utils->getDateNow();?>>
                                   <label for="txt_fechaINI" data-error="No cumple" >Fecha de Inicio</label>
                               </div>

                               <div class="input-field col s12 m6 l6">
                                   <input id="txt_fechaFIN" type="text" class="datepicker" value=<?php echo $utils->getDateNow();?>>
                                   <label for="txt_fechaFIN" data-error="No cumple" >Fecha Final</label>
                               </div>
                            </div>

                            
                            
                            
                        </div>
                    </form>
                </div>
            </div>

            <div class="containerajax" id="containerajax">


            </div>
        </div>
    </div><!-- End of Sign Up Card row -->

    </div> <!-- Fin del tab-->
</div>

