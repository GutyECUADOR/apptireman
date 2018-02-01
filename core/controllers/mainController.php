<?php namespace controllers;

   
class mainController {
    
   
    public function loadtemplate(){
        include 'views/logintemplate.php';
    }
    
    public function actionCatcherController(){
        if (isset($_GET['action'])){
           $action = $_GET['action'];
           $modulo = \models\mainModel::actionCatcherModel($action);
           
           include $modulo; 
        }else{
           $action = 'default';
           $modulo = \models\mainModel::actionCatcherModel($action);
           include $modulo; 
        }
       
    }
}
