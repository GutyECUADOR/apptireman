<?php 
    require_once '../../../core/models/OrdentModel.php';
    $ordentrabajo = new models\OrdentModel();
?>

<div class="col s12 m12 l12" name="row_llantas[]">
    <h5>Neumaticos: </h5>

    <div class="input-field col s12 m12 l2">
        <select name="seleccion_marcaLlanta[]" class="rowllantas" id="seleccion_marcaLlanta" onchange="ajax_getModelosLlantas(this)">
        <option value="" disabled selected>Seleccione:</option>
        <?PHP
            $ordentrabajo->getMarcasLlntas();
        ?>
        </select>
    </div>

    <div class="input-field col s12 m6 l3">
        <select name="seleccion_modeloLlanta[]" id="seleccion_modeloLlanta" onchange="ajax_getMedidasLlantas(this)">
        <option value="" disabled selected>Seleccione por favor:</option>

        </select>
    </div>

    <div class="input-field col s12 m6 l3">
        <select name="seleccion_medidaLlanta[]" id="seleccion_medidaLlanta" onchange="ajax_getValorLlantas(this)">
        <option value="" disabled selected>Seleccione por favor:</option>

        </select>
    </div>

    <div class="input-field col s12 m6 l1">
        <input type="number" name="txt_cantidadLlantas[]" id="txt_cantidadLlantas" class="center-align rowcantidadLlantas" value="0" onclick="extra_llanta(this);calcular_total_llantas()" onkeyup="extra_llanta(this);calcular_total_llantas()">
    </div>

    <div class="input-field col s12 m6 l2">
        <input type="number" step="0.01" class="importe_linea_llanta center-align" name="txt_valorLlantas[]" id="txt_valorLlantas" value="0" onkeyup="calcular_total_llantas()" onclick="calcular_total_llantas()">
        <input type="hidden" name="hidden_txt_CodLlantas[]">
        <input type="hidden" name="hidden_txt_valorLlantas[]">
    </div>

    <div class="input-field col s12 m12 l1 center-align">
        <a class="btn-floating waves-effect waves-light red removellanta_ico" onclick="remove_extra_llanta(this)"><i class="material-icons">delete_forever</i></a>
    </div>
</div> 