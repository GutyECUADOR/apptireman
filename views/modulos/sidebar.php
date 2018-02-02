<?php
ob_start(); // Activar buffer de salida, evitar error de envio de cabeceras  
$login = new controllers\loginController();
$sidebar = new controllers\licenciaController(); 
 

    ?>
        <!-- Usuarios Activos -->
            <ul class="side-nav fixed" id="mobile-menu" style="transform: translateX(0%);">
                <li><div class="user-view">
                <div class="background">
                    <?php $login->getSidebarHeaderBackground()?>
                </div>
                <a href="#!user">
                    <?php $login->getSidebarHeaderPerfilPicture()?>
                </a>
                <a href="#!name">
                    <span class="white-text name">
                        <?php
                            $login->getUserName();
                        ?>
                    </span>
                </a>
                <a href="#!email">
                    <span class="white-text email">
                        <?php
                            $login->getCorreo();
                        ?>
                    </span>
                </a>
              </div></li>
              
              
<?php if (isset($_SESSION["usuarioActivo"])){?>
              
                <li><a href="?action=inicio"><i class="material-icons">home</i>Inicio</a></li>
                
                <ul class="collapsible collapsible-accordion">
                    <li>
                    <a class="collapsible-header"><i class="material-icons mdi-navigation-arrow-drop-down">add</i>Nuevo<i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <?php foreach ($sidebar->getElementsMenuBySeccion('nuevo') as $row) {
                                if ($_SESSION['lv_acceso'] >= $row['lv_acceso']){
                                ?>
                            
                                <li><a class="waves-effect" href="?action=<?php echo $row['action']?>"><i class="material-icons"><?php echo $row['icon']?></i><?php echo $row['titulo']?></a></li>
                            
                             <?php 
                                } }?>
                        </ul>
                    </div>
                    </li>
                </ul>
                
                <ul class="collapsible collapsible-accordion">
                    <li>
                    <a class="collapsible-header"><i class="material-icons mdi-navigation-arrow-drop-down">insert_drive_file</i>E-Docs<i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <?php foreach ($sidebar->getElementsMenuBySeccion('e-docs') as $row) {
                                if ($_SESSION['lv_acceso'] >= $row['lv_acceso']){
                                ?>
                                <li><a class="waves-effect" href="?action=<?php echo $row['action']?>"><i class="material-icons"><?php echo $row['icon']?></i><?php echo $row['titulo']?></a></li>
                            
                             <?php }}?>
                        </ul>
                    </div>
                    </li>
                </ul>
                
                <ul class="collapsible collapsible-accordion">
                    <li>
                    <a class="collapsible-header"><i class="material-icons mdi-navigation-arrow-drop-down">poll</i>Procesos<i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <?php foreach ($sidebar->getElementsMenuBySeccion('procesos') as $row) {
                                if ($_SESSION['lv_acceso'] >= $row['lv_acceso']){
                                ?>
                                <li><a class="waves-effect" href="?action=<?php echo $row['action']?>"><i class="material-icons"><?php echo $row['icon']?></i><?php echo $row['titulo']?></a></li>
                            
                             <?php }}?>    
                        </ul>
                    </div>
                    </li>
                </ul>
                
                <li><a href="?action=evidenciaEstado"><i class="material-icons">image</i>Evidencia de Estado</a></li>
                
                <li><div class="divider"></div></li>
                <li><a class="subheader">Mecánicos</a></li>                    
                <li><a href="?action=tareasMecanico"><i class="material-icons">build</i>Tareas Pendientes</a></li>
                <!--<li><a href="?action=realizadasMecanico"><i class="material-icons">image</i>Imprimir Realizadas</a></li>-->

                <li><div class="divider"></div></li>
                <li><a class="subheader">Ayuda & Soporte</a></li>
                <li><a class="waves-effect" href="?action=ajustes"><i class="material-icons">settings</i>Ajustes</a></li>
                
                    <?php
                    if (isset($_SESSION["usuarioActivo"])){
                                echo '<li><a class="waves-effect" href="?action=logout"><i class="material-icons">settings_power</i>Cerrar Sesion';
                            }  else {
                                echo '<li><a class="waves-effect" href="?action=login"><i class="material-icons">settings_power</i>Iniciar Sesion';
                            }    
                    ?>
                    </a></li>
                    
                <li><a class="waves-effect" href="?action=acercade"><i class="material-icons">info_outline</i>Acerca del App</a></li>
                
            </ul>

    <?php
    }else{
    ?>
                <li><a href="?action=inicio"><i class="material-icons">home</i>Inicio</a></li>
                
                <ul class="collapsible collapsible-accordion">
                    <li>
                    <a class="collapsible-header"><i class="material-icons mdi-navigation-arrow-drop-down">insert_drive_file</i>E-Docs<i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect" href="?action=ordenTrabajo"><i class="material-icons">insert_drive_file</i>Orden de Trabajo</a></li>
                        </ul>
                    </div>
                    </li>
                </ul>
                
                <li><a href="?action=evidenciaEstado"><i class="material-icons">image</i>Evidencia de Estado</a></li>
                
                <li><div class="divider"></div></li>
                <li><a class="subheader">Mecánicos</a></li>                    
                <li><a href="?action=tareasMecanico"><i class="material-icons">build</i>Tareas Pendientes</a></li>
                <!--<li><a href="?action=realizadasMecanico"><i class="material-icons">image</i>Imprimir Realizadas</a></li>-->
                

                <li><div class="divider"></div></li>
                <li><a class="subheader">Ayuda & Soporte</a></li>
                
                    <?php
                    if (isset($_SESSION["usuarioActivo"])){
                                echo '<li><a class="waves-effect" href="?action=logout"><i class="material-icons">settings_power</i>Cerrar Sesion';
                            }  else {
                                echo '<li><a class="waves-effect" href="?action=login"><i class="material-icons">settings_power</i>Iniciar Sesion';
                            }    
                    ?>
                    </a></li>
                <li><a class="waves-effect" href="?action=acercade"><i class="material-icons">info_outline</i>Acerca del App</a></li>
                
            </ul>

        
    <?php    
    }

 ?>

    

        