<?php
    require_once '../../core/libs/mpdf57/mpdf.php';
    require_once '../../core/models/OrdentModel.php'; // Funciones del modulo
    $ordenAdmin = new models\OrdentModel();
    
    $codOrden = $_GET['codOrden'];
    
        $resultset = $ordenAdmin->getOrdenByID($codOrden);
        
        //Seteo de PDF
        $doc_sinespacios = str_replace(" ", "", $codOrden); //Quitar espacios en blanco
        $name_doc = 'ordendetrabajo'.$doc_sinespacios.'.pdf'; // Nombre del documento
        $css = file_get_contents('style.css');
        $destino = 'I';
    
        
    $html = '
      
    <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../core/resources/draweable/imges/logo.jpg" height="100" width="150">
      </div>
      <h1>ORDEN DE TRABAJO #'.$resultset['codOrden'].'</h1>
      <div id="contenedor_info">
            
            <div id="datos1">
              <div><span>ASESOR: </span> '.$resultset['asesorN'].'</div>
              <div><span>MECANICO:</span> '.$resultset['mecanicoN'].' </div>
              <div><span>CLIENTE:</span> '.$resultset['clienteN'].' </div>
              <div><span>VEHICULO:</span> '.$resultset['modelo_auto'].'('.$resultset['automovil'].') </div>
              <div><span>KILOMETRAJE:</span> '.$resultset['kilometraje'].' km</div>
              <div><span>FECHA:</span> '.$resultset['fecha'].'</div>
            </div>
      </div>    
    </header>
    <main>
    <div class="grupo-2">
        <table>
            <thead>
                <tr>
                    <th class="title-row border" colspan="12">NEUMÁTICOS</th>
                </tr>
                <tr>
                  <th class="border" colspan=2>Marca.</th>
                  <th class="border" colspan=4>Modelo.</th>
                  <th class="border" colspan=2>Medida.</th>
                  <th class="border" colspan=2>Cantidad.</th>
                  <th class="border" colspan=2>Valor.</th>
                </tr>';
    
    
                    $resultset_Detalle_Llantas = $ordenAdmin->getDetalleLlantasByID($codOrden);
                    
                     foreach ($resultset_Detalle_Llantas as $row){

                      $html .= '
                      <tr>
                        <td class="datos1 desc" colspan=2>'.strtoupper($row['marca']).'</td>
                        <td class="datos1 desc" colspan=4>'.strtoupper($row['modelo']).'</td>
                        <td class="datos1 desc" colspan=2>'.strtoupper($row['medida']).'</td>
                        <td class="datos1 desc" colspan=2>'.strtoupper($row['cantidad']).'</td>
                        <td class="datos1 desc" colspan=2>'.strtoupper($row['valor']).'</td>   
                      </tr>';

                    }
                 
                $html .= ' 
                   
                <tr>
                  <th class="title-row border" colspan="12">DETALLE DE PAGO POR NEUMÁTICOS</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>IVA.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['ivaLlantas'].'</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>% Descuento.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['descuentoLlantas'].'</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>Valor.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['valorLlantas'].'</th>
                </tr>

                <tr>
                    <th class="title-row border" colspan="12">PRODUCTOS & SERVICIOS</th>
                </tr>
                <tr>
                  <th class="border" colspan=2>Cod.</th>
                  <th class="border" colspan=6>Descripción.</th>
                  <th class="border" colspan=2>Cantidad.</th>
                  <th class="border" colspan=2>Valor.</th>
                </tr>';
    
    
                    $resultset_Detalle = $ordenAdmin->getDetalleOrdenByID($codOrden);
                    
                     foreach ($resultset_Detalle as $row){

                      $html .= '
                      <tr>
                        <td class="datos1 desc" colspan=2>'.$row['codProducto'].'</td>
                        <td class="datos1 desc" colspan=6>'.strtoupper($row['detalle']).'</td>
                        <td class="datos1 desc" colspan=2>'.$row['cantidad'].'</td>
                        <td class="datos1 desc" colspan=2>'.$row['valor'].'</td>
                      </tr>';

                    }
                 
                $html .= '     
              
                <tr>
                  <th class="title-row border" colspan="12">DETALLE DE PAGO POR PRODUCTOS & SERVICIOS</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>IVA.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['ivaProductos'].'</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>% Descuento.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['descuentoProd'].'</th>
                </tr>
                <tr>
                  <th colspan=3> 
                  <th colspan=3> 
                  <th class="border" colspan=3>Valor.</th>
                  <td class="border datos1 desc" colspan=3>'.$resultset['valorProductos'].'</th>
                </tr>
                
                <tr>
                  <th class="title-row border" colspan="12">OBSERVACIONES</th>
                </tr>
                <tr>
                  
                  <td class="border datos1 desc" colspan=12>'.$resultset['observacion'].'</th>
                </tr>
            </thead>';
                       
                    
                  
                        
            $html .= '                                  
            </tbody>
            </table>
            </div>


        </main>


            <div id="cont_firmas">
                <div id="firma1">Asesor: '.$resultset['asesorN'].' <br> CI:'.$resultset['asesor'].'</div>
               
                <div id="firma2">Cliente: '.$resultset['clienteN'].' <br> CI: '.$resultset['cliente'].'</div>
            </div>


        <footer>
            La información contenida en el presente documento es de uso exclusivo del empleado y/o empresa. La alteración total o parcial de los datos provistos en el sistema son considerados como delitos contra la seguridad de los activos de los sistemas de información y comunicación, según lo estipulado en el artículo 232 del Código Orgánico Integral Penal, cuya sanción es la pena privativa de libertad de tres a cinco años.
        </footer>
      </body>


        ';
     
    $mpdf = new mPDF('c','A4');
    
    if($resultset['estado']==1){
         
        $mpdf->SetWatermarkText('ANULADO');
        $mpdf->showWatermarkText = true;    
    }
   

    
    $mpdf->WriteHTML($css,1);
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->SetTitle('Orden de trabajo - '.$codOrden);
    $mpdf->WriteHTML($html);
    $mpdf->Output($name_doc, $destino);
    
        
    