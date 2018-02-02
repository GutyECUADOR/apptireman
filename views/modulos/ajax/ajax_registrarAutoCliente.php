<?php
require_once '../../../core/models/OrdentModel.php';
$ordentrabajo = new \models\OrdentModel();


$seleccion_cliente = $_POST['seleccion_cliente'];
$seleccion_auto =$_POST['seleccion_auto'];
$placas_modal =$_POST['placas_modal'];
$anio_modal =$_POST['anio_modal'];
$color_modal =$_POST['color_modal'];
                       
if ($seleccion_cliente=='' || $placas_modal =='' ){
        echo ' No se realizó el registro. Campo obligatorio se encontró vacio (PLACAS son unicas)';
}else{
        
        $filasafectadas = $ordentrabajo->insertAutoClienteNuevo($seleccion_cliente, $seleccion_auto, $placas_modal, $anio_modal, $color_modal);
        if ($filasafectadas>=1){
        
            echo '
            <p> Registro Exitoso, </p>
            <p> '.$seleccion_auto.'('.$placas_modal.'), propiedad de '.$seleccion_cliente.' 
            ';
            
                
        }
            else
            {
            echo '
            <p> Error. No se pudieron registrar los datos, revise que no existan placas identicas ya registradas. ';
            
            }
    
    
}

