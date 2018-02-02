<?php
require_once '../clases/OrdentClass.php'; // Funciones del modulo
$ordentrabajo = new OrdentClass();

if (!empty($_POST['txt_ci_ruc'])) {
   
    
                    
                    echo "<script language = javascript>
                            swal({  title: 'Envio Correcto',
                                text: 'Correcto. Se cargaron además $count archivo(s) relacionado(s) al registro, desea imprimir el reporte?',  
                                type: 'success',    
                                showCancelButton: true,   
                                closeOnConfirm: false, 
                                cancelButtonText: 'No, gracias', 
                                confirmButtonText: 'Si, Imprimir', 
                                showLoaderOnConfirm: true, }, 
                                function(isConfirm)
                                {
                                    if (isConfirm) 
                                    {
                                    
                                    swal({
                                        title: 'Generando PDF!',
                                        type: 'success', 
                                        timer: 2000,
                                        showConfirmButton: false
                                        
                                      });
                                      
                                     location = '?action=inicio'; 
                                     window.open('reporte_byid.php?codOrden=$codOrden');
                                    } 
                                    else 
                                    {
                                    location = '?action=inicio'; 
                                    
                                    }
                                 
                                });
                        </script>";
                    
                    
               
    }else
    {
    echo "<script language = javascript>
            swal({  title: 'Error al enviar',
            text: 'Codigo necesario no encontrado, no se ha realizado el registro!',  
            type: 'error',    
            showCancelButton: false,   
            closeOnConfirm: false,   
            confirmButtonText: 'Aceptar', 
            showLoaderOnConfirm: true, }, 
            function(){   
                setTimeout(function(){     
                    location = '?action=inicio';  
                });
                 });
        </script>"; 
                               
    }

               
                 
              