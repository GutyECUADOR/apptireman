<div class="col s12 m12 l12" name="row_llantas[]">
    <h5>Neumaticos: </h5>

    <div class="input-field col s12 m6 l2">
        <input type="text" class="center-align" name="txt_codLlantas[]" id="txt_codLlantas" value="-" readonly>
      
    </div>

    <div class="input-field col s12 m6 l5">
        <input type="text" class="autocompleteLlantas center-align uppercase rowllantas" name="txt_llantas[]" id="txt_llantas" placeholder="Indique item" onchange="ajaxvalidacod_llantas(this)" onfocus="autocompletadoLlantas()">
     
    </div>

    <div class="input-field col s12 m6 l2">
        <input type="number" name="txt_cantidadLlantas[]" id="txt_cantidadLlantas" class="center-align" value="0">
       
    </div>

    <div class="input-field col s12 m6 l2">
        <input type="text" class="importe_linea center-align" name="txt_valorLlantas[]" id="txt_valorLlantas" value="0" onkeyup="calcular_total()">
        <input type="hidden" name="hidden_txt_valorLlantas[]">
        
    </div>

    <div class="input-field col s12 m12 l1 center-align">
        <a class="btn-floating waves-effect waves-light red removellanta_ico" onclick="remove_extra_llanta(this)"><i class="material-icons">delete_forever</i></a>
    </div>

</div>  