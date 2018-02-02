<?php 
$licencia = new controllers\licenciaController();
$licencia->enableSegurity('evidenciaEstado');

$utilidades = new \controllers\utilidadesController();
$utilidades->deleteItemEvidencia();

$directorio = "./core/resources/evidenciaEstado/";

$ficheros = array_diff(scandir($directorio,1), array('.', '..'));


?>

<div class="container">
    
        <div class="row">
            
            <?php foreach ($ficheros as $imagen){ ?>
            <form>
            <div class="col s12 m4 l4">
              <div class="card">
                <div class="card-image">
                  <img class="materialboxed" src="./core/resources/evidenciaEstado/<?php echo $imagen ?>" data-caption="ID de evidencia: <?php echo $imagen ?>">
                    <input type="hidden" name="idItem" value="<?php echo $imagen ?>">
                     <?php if (isset($_SESSION['usuarioActivo']) && $_SESSION['lv_acceso'] > 5){?>
                        <button class="btn-floating halfway-fab waves-effect waves-light red" type="submit" name="action" value="evidenciaEstado">
                            <i class="material-icons right">delete</i>
                        </button>
                    <?php }?>
                </div>
                 
              </div>
            </div>
            </form>
            <?php }?>
            
        </div><!-- End of Sign Up Card row -->
  
</div>    
     