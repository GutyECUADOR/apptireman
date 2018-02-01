<?php 
    if (!isset($_SESSION["usuarioRUC"])){
           header("Location:index.php?&action=login");  
        } 
        
    $edocs = new models\EDocsClass();    
    $resultset = $edocs->getAllDocumentsByRUC($_SESSION["usuarioRUC"], 'FV', $edocs->getDateNow(), $edocs->getDateNow());
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    
    <!-- Bootstrap -->
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo ROOT_PATH; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo ROOT_PATH; ?>assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo ROOT_PATH; ?>assets/iCheck/skins/flat/green.css" rel="stylesheet">
    
    <!-- PNotify -->
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo ROOT_PATH; ?>assets/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo ROOT_PATH; ?>assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo ROOT_PATH; ?>assets/build/css/custom.css" rel="stylesheet">
    
   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-user"></i> <span>KAO Sport</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo ROOT_PATH; ?>assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo ucwords(strtolower($_SESSION['usuarioNOMBRE'])) ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include_once('sis_modules/sidebar.php')?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include_once('sis_modules/menu_footer.php')?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include 'sis_modules/top_navigation.php'?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <div class="row">
           
            <div class="col-md-12 col-sm-12 col-xs-12">



              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Ultimos Documentos <small>Ultimos 10 elementos</small></h2>
                      
                      <div class="clearfix"></div>
                    </div>
                    
                       <div class="x_content">

                    <p>Utilice las <code>Opciones de Busqueda</code> si su documento no se encuentra listado. Los resultados de busqueda pueden tardar hasta <code>30 segundos</code> segun tipo de documento.</p>
 
                    <fieldset>
                          <div class="control-group">
                            <div class="controls">
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="input-group date" id="myDatepickerINI">
                                            <input type="text" class="form-control" id="txtDatepickerINI" readonly="readonly" value="<?php echo $edocs->getDateNow();?>">
                                            <span class="input-group-addon">
                                               <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="input-group date" id="myDatepickerFIN">
                                            <input type="text" class="form-control" id="txtDatepickerFIN" readonly="readonly" value="<?php echo $edocs->getDateNow();?>">
                                            <span class="input-group-addon">
                                               <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        
                                        <select class="select_group form-control" name="selectTypoDoc" id="selectTypoDoc1">
                                            <optgroup label="Tipo de Documento">
                                                <option value="FV" selected=>Facturas</option>
                                                <option value="NC">Nota de Crédito</option>
                                                <option value="RT">Retenciones</option>
                                                <option value="GR">Guía de Remisión</option>
                                            </optgroup>
                                         </select>
                                    </div>
                                </div>
                                
                               
                              <div class="col-sm-3 col-sm-12 col-xs-12">
                                  <button type="button" class="btn btn-primary btn-block" id="btn_buscar_edocs">Buscar</button>
                              </div>
                            </div>
                          </div>
                      </fieldset>
                   
                    <div id="resultados_ajaxDocs">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>#</th>
                                    <th class="column-title">Fecha </th>
                                    <th class="column-title">RUC/CI </th>
                                    <th class="column-title">Nombres</th>
                                    <th class="column-title">Documento</th>
                                    <th class="column-title">Tipo</th>
                                    <th class="column-title">Descargar</th>
                                  </tr>
                                </thead>
                        
                            
                                <tbody>
                                 <tr class="even pointer">
                                 <?php 

                                   foreach ($resultset as $row) { ?>

                                     <td class="">-</td>
                                     <td class=""><?php echo $row['fecha']?></td>
                                     <td class=""><?php echo $row['ruc']?></td>
                                     <td class=""><?php echo $row['ClienteN']?></td>
                                     <td class=""><?php echo $row['numero']?></td>
                                     <td class=""><?php echo $edocs->getTypeDocument($row['tipo'])?></td>
                                     <td class="" >
                                       <a href="<?php echo ROOT_EDOCSPDF.$row['archivopdf']?>" target='_blank' class="generapdf" download="<?php echo $row['archivopdf']?>"><span class="count_top"><i class="fa fa-file-pdf-o"></i> PDF</span></a>
                                       <a href="<?php echo ROOT_EDOCSXML.$row['archivoxml']?>" target='_blank' class="generaxml" download="<?php echo $row['archivoxml']?>"><span class="count_top"><i class="fa fa-file-code-o"></i> XML</span></a>
                                     </td>

                                 </tr>
                                 <?php
                                   }
                                 ?>
                               </tbody>
                            </table>
                    </div> <!-- end table responsive-->
					
                        
                    </div> <!-- end content ajax-->
                    		
						
                  </div> <!-- end x content -->
                    
                  </div>
                </div>

              </div>
              <div class="row">

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
     <!-- jQuery -->
    <script src="<?php echo ROOT_PATH; ?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo ROOT_PATH; ?>assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo ROOT_PATH; ?>assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo ROOT_PATH; ?>assets/moment/min/moment.min.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
     <!-- bootstrap-datetimepicker es-->    
    <script src="<?php echo ROOT_PATH; ?>assets/bootstrap-datetimepicker/locale/es.js"></script>
    
    <!-- Ion.RangeSlider -->
    <script src="<?php echo ROOT_PATH; ?>assets/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="<?php echo ROOT_PATH; ?>assets/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?php echo ROOT_PATH; ?>assets/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="<?php echo ROOT_PATH; ?>assets/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper No Supported -->
    
    <!-- PNotify -->
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/pnotify/dist/pnotify.nonblock.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo ROOT_PATH; ?>assets/build/js/custom.js"></script>
     
    <!-- Estilos Personalizados extra -->
    <script src="<?php echo ROOT_PATH; ?>assets/functions.js"></script>
    
    
    
  </body>
</html>
