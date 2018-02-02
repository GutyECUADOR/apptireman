<?php namespace controllers;

class utilidadesController {
    
    public function deleteItemEvidencia(){
        if (isset($_GET['idItem'])) {
            if (unlink(SITE_ROOTSIMPLE2.$_GET['idItem'])){
               
                echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel blue darken-3">
                                    <span class="white-text center-align"><i class="material-icons small">add</i> Archivo eliminado. '.$_GET['idItem'].'</span>
                                </div>
                            </div>
                        </div>    
                        
                        ';
                
            }else{
                echo '
                        <div class="row">
                            <div class="col s6 offset-s3">
                                <div class="card-panel red darken-3">
                                    <span class="white-text center-align"><i class="material-icons small">error</i> No se ha podido borrar el archivo.</span>
                                </div>
                            </div>
                        </div>    
                        
                        ';
            }
        }
        
    }
    
    public function isChecked($valorCheck) {
        if (isset($valorCheck) && $valorCheck==1) {
            return 'checked';
        }  else {
            return '';
        }
    }

    public function getDateNow(){
        return date('Y-m-d');
    }
    
}
