<?php namespace models;

class mainModel {
    
    public function actionCatcherModel($action){
        switch ($action) {
            case 'inicio':
                $contenido = "views/modulos/inicio.php";
                break;
            
            case 'acercade':
                $contenido = "views/modulos/acercade.php";
                break;
            
            case 'agregarProducto':
                $contenido = "views/modulos/agregarProducto.php";
                break;
            
            case 'agregarCliente':
                $contenido = "views/modulos/agregarCliente.php";
                break;
            
            case 'agregarNeumatico':
                $contenido = "views/modulos/agregarNeumatico.php";
                break;
            
            case 'agregarVehiculo':
                $contenido = "views/modulos/agregarVehiculo.php";
                break;
            
            case 'reportes':
                $contenido = "views/modulos/reportes.php";
                break;
            
            case 'inventario':
                $contenido = "views/modulos/inventario.php";
                break;
            
            case 'evidenciaEstado':
                $contenido = "views/modulos/evidenciaEstado.php";
                break;
            
            case 'login':
                $contenido = "views/modulos/login.php";
                break;
            
            case 'logout':
                $contenido = "views/modulos/cerrarSesion.php";
                break;
            
            case 'ordenTrabajo':
                $contenido = "views/modulos/ordenTrabajo.php";
                break;
          
            case 'editaOrden':
                $contenido = "views/modulos/ordenTrabajoEdit.php";
                break;

            case 'tareasMecanico':
            $contenido = "views/modulos/tareasMecanico.php";
            break;
            
            
            default:
                $contenido = "views/modulos/inicio.php";
                break;
        }
        
       
        return $contenido;
        
    }
}
