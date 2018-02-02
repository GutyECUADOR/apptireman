<?php
    $login = new controllers\loginController();
    $login->actionValidaIngreso();
    
    $licencia = new controllers\licenciaController();

    if($licencia->validateLicenciaKey()){
     header('location:index.php?action=acercade');
    }
    
    if (isset($_SESSION["usuarioActivo"])){
        echo "Se ha detectado una sesion activa";
        header('location:index.php?action=inicio');
        
    }
    
    
?>

<!-- Sign Up Card row -->
        <div class="container wrap">
            <div class="row">
              <div class="col s12">
                <div class="card z-depth-1">
                    
                    <div class="card-content">
                      <span class="card-title center"><h4>Inicio de Sesion</h4></span>
                      <form action="" method="POST" autocomplete="off">
                        <div class = "row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" id="txt_usuario" name="txt_usuario" class="validate">
                                <label for="txt_usuario">Usuario del Sistema o RUC</label>
                            </div>
                            
                          <div class="input-field col s12 m12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" id="txt_password" name="txt_password" class="validate">
                                <label for="password">Contraseña</label>
                          </div>
                          <div class="input-field col s12 m12 center">
                              <input type="submit" class="btn" name="action" value="Ingresar">
                          </div>
                        </div>
                      </form>


                  </div>

                </div>
              </div>
            </div><!-- End of Sign Up Card row -->
        </div>
            