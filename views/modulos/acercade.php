<?php
$licencia = new controllers\licenciaController();


?>

<div class="container">
    <div class="row">

    <div class="col s12 m6 l6 offset-m3 offset-l2">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="./core/resources/draweable/imges/backgrounds/backkey.png">
            </div>
            <div class="card-content center-align">
              <span class="card-title activator grey-text text-darken-4"><?php echo APP_NAME?> APP - v. <?php echo APP_VERSION?><i class="material-icons right">more_vert</i></span>
              <?php $arrayLicencia = $licencia->getLicenseValues();?>
              <p><a href="#"><?php echo $arrayLicencia['tipokey'] ?></a></p>
              <?php 
                    if($licencia->validateLicenciaKey()){
                        echo '<p class="red-text">Su licencia ha caducado<p>';
                   }
                ?>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4 center-align">Detalles de Licencia<i class="material-icons right">close</i></span>
                <p><b>KEY Code: </b><?php echo substr($arrayLicencia['key'], 0, -3) .'XXX'?></p>
                <p><b>Licencia a nombre de: </b><?php echo $arrayLicencia['propietario'] ?></p>
                <p><b>Tipo de Key: </b><?php echo $arrayLicencia['tipokey'] ?></p>
                <p><b>Licencia valida hasta: </b><?php echo $arrayLicencia['fechaValidez'] ?></p>
                <p><b>Descripción: </b><?php echo $arrayLicencia['descripcion'] ?></p>
                
                
                
            </div>
        </div>
        
    </div>


</div> 
           

</div>
