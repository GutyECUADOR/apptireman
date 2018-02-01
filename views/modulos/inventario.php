<?php 
    if (!isset($_SESSION["usuarioActivo"])){
           header("Location:index.php?&action=inicio");  
        }    
?>

<div class="container">
    <!-- Card de registro de productos -->
    <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <span class="card-title center-align"><h5>Productos en Bodega</h5></span>
                    <form autocomplete="off">
                        <div class="row">
                            
                            <table class="striped centered responsive-table">
                                <thead>
                                  <tr>
                                      <th>Codigo</th>
                                      <th>Producto</th>
                                      <th>Existencias</th>
                                      <th>Valor</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <tr>
                                    <td>Alvin</td>
                                    <td>Eclair</td>
                                    <td>2</td>
                                    <td>$0.87</td>
                                  </tr>
                                  <tr>
                                    <td>Alan</td>
                                    <td>Jellybean</td>
                                    <td>$3.76</td>
                                  </tr>
                                  <tr>
                                    <td>Jonathan</td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
                                  </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div><!-- End of Sign Up Card row -->
</div>    
        