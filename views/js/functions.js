        // Deshabilitar enter key al inicializar
            $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which === 13) {
                    return false;
                }
            });
            
                // Carga Autocompletado para row inicial de productos
                 $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: './views/modulos/ajax/json_getallproducts.php',
                    success: function(response) {
                      var countryArray = response;
                      var dataArray = {};
                      for (var i = 0; i < countryArray.length; i++) {
                        //console.log(countryArray[i].name);
                        dataArray[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
                      }
                      $('input.autocomplete').autocomplete({
                        data: dataArray,
                        limit: 5 // The max amount of results that can be shown at once. Default: Infinity.
                      });
                    }
                  });
                  
                  // Carga Autocompletado para row inicial de llantas
                 $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: './views/modulos/ajax/json_getllantasAll.php',
                    success: function(response) {
                      var countryArray = response;
                      var dataArray = {};
                      for (var i = 0; i < countryArray.length; i++) {
                        //console.log(countryArray[i].name);
                        dataArray[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
                      }
                      $('input.autocompleteLlantas').autocomplete({
                        data: dataArray,
                        limit: 5 // The max amount of results that can be shown at once. Default: Infinity.
                      });
                    }
                  });
            
            });
       
       
        // Carga Autocompletado para rows agregados
       
            function autocompletadoOK() {
              $.ajax({
                type: 'GET',
                dataType: 'json',
                url: './views/modulos/ajax/json_getallproducts.php',
                success: function(response) {
                  var countryArray = response;
                  var dataArray = {};
                  for (var i = 0; i < countryArray.length; i++) {
                    //console.log(countryArray[i].name);
                    dataArray[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
                  }
                  $('input.autocomplete').autocomplete({
                    data: dataArray,
                    limit: 5 // The max amount of results that can be shown at once. Default: Infinity.
                  });
                }
              });
            };
     
            function autocompletadoLlantas(){
                // Carga Autocompletado para row inicial de llantas
                 $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: './views/modulos/ajax/json_getllantasAll.php',
                    success: function(response) {
                      var countryArray = response;
                      var dataArray = {};
                      for (var i = 0; i < countryArray.length; i++) {
                        //console.log(countryArray[i].name);
                        dataArray[countryArray[i].name] = countryArray[i].flag; //countryArray[i].flag or null
                      }
                      $('input.autocompleteLlantas').autocomplete({
                        data: dataArray,
                        limit: 5 // The max amount of results that can be shown at once. Default: Infinity.
                      });
                    }
                  });
            
            }    


            function replacePLACA(valorInput){
                var nuevoValor=valorInput.replace('-','');
                document.getElementById("placas_modal").value = nuevoValor;
            }
            
            // Funcion para generar reporte 
            
            function fn_genreport(this_elemento){
                var data_id = this_elemento.id;
                swal({
                    title: 'Generando Reporte',
                    text: 'Generando orden de trabajo - ' +data_id,
                    timer: 1000,
                    onOpen: function () {
                      swal.showLoading();
                      
                    }
                  }).then(
                    function () {},
                    
                    function (dismiss) {
                      if (dismiss === 'timer') {
                        window.open('core/reportes/reporte_byid.php?codOrden='+data_id);
                      }
                    }
                 );
            };
            
            function fn_editOrdenT(this_elemento){
                var data_id = this_elemento.id;
                $("#modalUpdate_title").html("Editando: " +data_id);
                $('#modalUpdateOrden').modal('open');
                
            }



                    // Funcion de busqueda
                    
                    function ajax_searchLlantasByCI(){
                        var marca = document.getElementById("seleccion_marcaLlanta").value;
                        var fechaINI =document.getElementById("txt_fechaINI").value;
                        var fechaFIN =document.getElementById("txt_fechaFIN").value;
                        
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_searchVentasLlantas.php', 

                           data: {marca: marca, fechaINI:fechaINI, fechaFIN:fechaFIN},

                        success : function(response)
                            {
                                Materialize.toast('Buscando', 3000);
                                document.getElementById("containerajax").innerHTML = response;
                            }
                            });
                   
                    };
                    
                    // Funcion de busqueda
                    
                    function ajax_searchOrdenesTrabajo(){
                        var cedula = document.getElementById("txt_busqueda").value;
                        var fechaINI =document.getElementById("txt_fechaINI").value;
                        var fechaFIN =document.getElementById("txt_fechaFIN").value;
                       
                        
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_searchOrdenesT.php', 

                           data: {cedula: cedula, fechaINI:fechaINI, fechaFIN:fechaFIN},

                        success : function(response)
                            {
                                Materialize.toast('Buscando', 3000);
                                document.getElementById("containerajax").innerHTML = response;
                                $('.dropdown-button').dropdown();
                            }
                            });
                   
                    };

                    // Funcion de mecanicos
                    
                    function ajax_searchOrdenesMecanicos(){
                        var cedula = document.getElementById("txt_busqueda").value;
                        var fechaINI =document.getElementById("txt_fechaINI").value;
                        var fechaFIN =document.getElementById("txt_fechaFIN").value;
                       
                        
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_searchPendienteMecanico.php', 

                           data: {cedula: cedula, fechaINI:fechaINI, fechaFIN:fechaFIN},

                        success : function(response)
                            {
                                Materialize.toast('Buscando', 3000);
                                document.getElementById("containerajax").innerHTML = response;
                                $('.dropdown-button').dropdown();
                                $('.materialboxed').materialbox();
                            }
                            });
                   
                    };
                    

                    // Funcion de valdacion de codigo de seguridad
                    
                    function ajaxvalidacod(){
                   
                       var cod_usu_ing =document.getElementById("cajacod").value;
                       var cod_apell_ing =document.getElementById("seleccion_evaluador").value;
                       
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/valida_cod.php', 

                           data: {post_cod_usr: cod_usu_ing, post_apll_urs: cod_apell_ing},

                        success : function(r)
                            {
                              $('#mymodal').show();  // put your modal id 
                              $('.resultmodal').show().html(r);
                            }
                            });
                   
                    };   
                    
                    // Registra valores en base de datos
                    function registrarCliente(){
                       var ruc_modal =document.getElementById("ruc_modal").value;
                       var clientename_modal =document.getElementById("clientename_modal").value;
                       var direccion_modal =document.getElementById("direccion_modal").value;
                       var telefono_modal =document.getElementById("telefono_modal").value;
                       var correo_modal =document.getElementById("correo_modal").value;
                       
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/registrarCliente.php', 

                           data: {ruc_modal: ruc_modal, clientename_modal: clientename_modal,direccion_modal:direccion_modal,telefono_modal:telefono_modal,correo_modal:correo_modal},

                        success : function(response)
                            {
                              Materialize.toast(response, 7000);
                              document.getElementById("registrar_Cliente").reset();
                              
                            }
                            });
                    };   
                    
                    
                    // Registra valores en base de datos
                    function registrarProducto(){
                   
                       var codigo =document.getElementById("txt_codReferencial").value;
                       var producto =document.getElementById("txt_nombreProducto").value;
                       var cantidad =document.getElementById("txt_cantProducto").value;
                       var valor =document.getElementById("txt_valorProducto").value;
                       
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_registrarProducto.php', 

                           data: {codigo: codigo, producto: producto,cantidad:cantidad,valor:valor},

                        success : function(response)
                            {
                              Materialize.toast(response, 5000);
                              document.getElementById("registrar_Producto").reset();
                            }
                            });
                    };   
                    
                    // Registra valores en base de datos
                    function registrarNeumatico(){
                   
                       var codigo =document.getElementById("txt_codReferencial").value;
                       var detalle =document.getElementById("txt_detalle").value;
                       var marca =document.getElementById("seleccion_marca").value;
                       var modelo =document.getElementById("txt_modelo").value;
                       var medida =document.getElementById("txt_medida").value;
                       var cantidad =document.getElementById("txt_cantidad").value;
                       var costo =document.getElementById("txt_costo").value;
                       
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_registrarNeumatico.php', 

                           data: {codigo: codigo, detalle: detalle, marca:marca, modelo:modelo, medida:medida, cantidad:cantidad, costo:costo},

                        success : function(response)
                            { 
                              Materialize.toast(response, 5000);
                              document.getElementById("registrar_Neumaticos").reset();
                            }
                            });
                    };   
                    
                    
                    // Registra valores en base de datos
                    function registrarAutoCliente(){
                   
                       var seleccion_cliente =document.getElementById("seleccion_cliente").value;
                       var seleccion_auto =document.getElementById("seleccion_modeloauto").value;
                       var placas_modal =document.getElementById("placas_modal").value;
                       var anio_modal =document.getElementById("anio_modal").value;
                       var color_modal =document.getElementById("seleccion_color").value;
                     
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_registrarAutoCliente.php', 

                           data: {seleccion_cliente: seleccion_cliente, seleccion_auto: seleccion_auto, placas_modal:placas_modal,anio_modal:anio_modal,color_modal:color_modal},

                        success : function(response)
                            {
                                
                              Materialize.toast(response, 5000);
                              document.getElementById("registrar_Vehiculo").reset();
                            }
                            });
                    };   
                    
                    
                    // Registra valores en base de datos
                    function registrarOrdenTrabajo(){
                   
                       var seleccion_cliente =document.getElementById("seleccion_cliente").value;
                       var seleccion_auto =document.getElementById("seleccion_modeloauto").value;
                       var placas_modal =document.getElementById("placas_modal").value;
                       var anio_modal =document.getElementById("anio_modal").value;
                       var color_modal =document.getElementById("seleccion_color").value;
                     
                        $.ajax({
                           type : 'post',
                            url : './views/modulos/ajax/ajax_registrarAutoCliente.php', 

                           data: {seleccion_cliente: seleccion_cliente, seleccion_auto: seleccion_auto, placas_modal:placas_modal,anio_modal:anio_modal,color_modal:color_modal},

                        success : function(response)
                            {
                                
                              Materialize.toast(response, 5000);
                              document.getElementById("registrar_Vehiculo").reset();
                            }
                            });
                    };   
                    
                    
                    
                    
                    var limite = 1;      
                    function add_row(){
                        
                        $.ajax({
                           type : 'get',
                            url : './views/modulos/ajax/agrega_row.php', 
                          
                        success : function(response)
                            {
                                if (limite < 25){
                                    $('.result_add').append(response);  
                                    limite++;
                                }else{
                                     swal({  title: 'Límite alcanzado',
                                        text: 'Se pueden registrar hasta 25 productos por solicitud',  
                                        type: 'warning',    
                                        showCancelButton: false,   
                                        closeOnConfirm: false,   
                                        confirmButtonText: 'Aceptar', 
                                        showLoaderOnConfirm: true } 
                                        ); 
                                }
                              
                            }
                        });
                      
                    };      
                    
                    function add_row_llantas(){
                        
                        $.ajax({
                           type : 'get',
                            url : './views/modulos/ajax/agrega_llantas.php', 
                          
                        success : function(response)
                            {
                                if (limite < 25){
                                    $('.result_addLlantas').append(response); 
                                    $('select').material_select();
                                    limite++;
                                }else{
                                     swal({  title: 'Límite alcanzado',
                                        text: 'Se pueden registrar hasta 25 productos por solicitud',  
                                        type: 'warning',    
                                        showCancelButton: false,   
                                        closeOnConfirm: false,   
                                        confirmButtonText: 'Aceptar', 
                                        showLoaderOnConfirm: true } 
                                        ); 
                                }
                              
                            }
                        });
                      
                    };      
                    
                    
                    function remove_extra_prod(row_clicked_delete){
                  
                    if (limite <= 1)  
                        {
                            swal({  title: 'Solicitud Vacia',
                                text: 'Debe existir al menos 1 producto',  
                                type: 'warning',    
                                showCancelButton: false,   
                                closeOnConfirm: false,   
                                confirmButtonText: 'Aceptar', 
                                showLoaderOnConfirm: true } 
                                ); 
                        }
                        else
                        {    
                            limite--;
                            position_delete_prod = false;
                            rows = document.getElementsByClassName("removeprod_ico");

                            for (i = 0, total = rows.length; i < total; i++) {
                                if (rows[i] === row_clicked_delete){
                                position_delete_prod = i;
                                document.getElementsByName("row_productos[]")[position_delete_prod].remove();

                                    if (rows.length<=0){
                                    document.getElementById("txt_subtotal").value= "";
                                    document.getElementById("txt_iva").value= "";
                                    document.getElementById("txt_total").value= "";
                                    }
                                }
                            }
                            calcular_total();
                        }
                    };
                    
                    // Elimina la fila de columna clickeada
                    function remove_extra_llanta(row_clicked_delete){
                  
                    if (limite <= 1)  
                        {
                            swal({  title: 'Solicitud Vacia',
                                text: 'Debe existir al menos 1 producto',  
                                type: 'warning',    
                                showCancelButton: false,   
                                closeOnConfirm: false,   
                                confirmButtonText: 'Aceptar', 
                                showLoaderOnConfirm: true } 
                                ); 
                        }
                        else
                        {    
                            limite--;
                            position_delete_prod = false;
                            rows = document.getElementsByClassName("removellanta_ico");

                            for (i = 0, total = rows.length; i < total; i++) {
                                if (rows[i] === row_clicked_delete){
                                position_delete_prod = i;
                                document.getElementsByName("row_llantas[]")[position_delete_prod].remove();
                                    if (rows.length<=0){
                                    document.getElementById("txt_subtotal").value= "";
                                    document.getElementById("txt_iva").value= "";
                                    document.getElementById("txt_total").value= "";
                                    }
                                }
                            }
                            calcular_total();
                        }
                    };
                    
                    
                    function ajaxvalidacod_llantas(row_clicked){
                        
                        position = false;
                        // Obtener un conjunto HTML Objets
                        rows = document.getElementsByClassName("rowllantas");
                    
                        for (i = 0, total = rows.length; i <= total; i++) {
                            if (rows[i] === row_clicked){ // Comparamos el objeto HTML con el conjunto de Objetos
                            position = i; // Recuperamos posicion del elemento
                              
                                var mutli_cod = document.getElementsByName("txt_llantas[]")[position].value;
                                
                                //alert(mutli_cod);
                                $.ajax({
                                   type : 'get',
                                    url : './views/modulos/ajax/json_llantas.php', 
                                    dataType: "json",

                                    data: {cod_llanta: mutli_cod},

                                    success : function(response)
                                    {   
                                      //j = i-1;Contador adicional para evitar modificar i y generar bucle
                                    
                                        if(response.length!==0){
                                            document.getElementsByName("txt_codLlantas[]")[position].value = response[0]['codigo'];
                                            document.getElementsByName("txt_llantas[]")[position].value = response[0]['producto'];
                                            document.getElementsByName("txt_cantidadLlantas[]")[position].value = 1;
                                            
                                            var costo_prod = response[0]['valor'];
                                            var costo_prod_fixed = (Math.round(costo_prod * 100) / 100).toFixed(2);
                                           
                                            
                                            document.getElementsByName("hidden_txt_valorLlantas[]")[position].value = costo_prod_fixed;
                                            document.getElementsByName("txt_valorLlantas[]")[position].value = costo_prod_fixed;
                                            calcular_total();
                                        }else{
                                            document.getElementsByName("txt_codLlantas[]")[position].value = "- Sin Identificar -";
                                            document.getElementsByName("txt_cantidadLlantas[]")[position].value = 0;
                                            document.getElementsByName("txt_valorLlantas[]")[position].value = 0;
                                        }
                                    }
                                });
                                //Fin de AJAX
                            
                            
                            
                            }
                        }
                        
                    }; 
                    
                    
                    
                    function ajaxvalidacod_producto(row_clicked){
                        
                        position = false;
                        // Obtener un conjunto HTML Objets
                        rows = document.getElementsByClassName("rowproducto");
                    
                        for (i = 0, total = rows.length; i <= total; i++) {
                            if (rows[i] === row_clicked){ // Comparamos el objeto HTML con el conjunto de Objetos
                            position = i; // Recuperamos posicion del elemento
                              
                                var mutli_cod = document.getElementsByName("txt_detalle_product[]")[position].value;
                                
                                //alert(mutli_cod);
                                $.ajax({
                                   type : 'get',
                                    url : './views/modulos/ajax/json_producto.php', 
                                    dataType: "json",

                                    data: {cod_producto: mutli_cod},

                                    success : function(response)
                                    {   
                                      //j = i-1;Contador adicional para evitar modificar i y generar bucle
                                    
                                        if(response.length!==0){
                                            document.getElementsByName("txt_cod_product[]")[position].value = response[0]['codigo'];
                                            document.getElementsByName("txt_detalle_product[]")[position].value = response[0]['producto'];
                                            document.getElementsByName("txt_cant_product[]")[position].value = 1;
                                            
                                            var costo_prod = response[0]['valor'];
                                            var costo_prod_fixed = (Math.round(costo_prod * 100) / 100).toFixed(2);
                                           
                                            
                                            document.getElementsByName("txt_precio_product[]")[position].value = costo_prod_fixed;
                                            document.getElementsByName("hidden_precio_product[]")[position].value = costo_prod_fixed;
                                            calcular_total_productos();
                                        }else{
                                            document.getElementsByName("txt_cod_product[]")[position].value = "- Sin Identificar -";
                                            document.getElementsByName("txt_cant_product[]")[position].value = 0;
                                            document.getElementsByName("txt_precio_product[]")[position].value = 0;
                                        }
                                    }
                                });
                                //Fin de AJAX
                            
                            
                            
                            }
                        }
                        
                    }; 
                    
                 
                 
                // Funcion multiplica el valor del producto X
                function extra_prod(row_clicked) {

                    position_cant = false;
                    rows = document.getElementsByClassName("rowcantidad");

                    for (i = 0, total = rows.length; i < total; i++) {
                        if (rows[i] === row_clicked) {
                            position_cant = i;
                            var precio_prod = document.getElementsByName("hidden_precio_product[]")[position_cant].value;
                            var mutli_cod = document.getElementsByName("txt_cant_product[]")[position_cant].value; // Valor X multiplica

                            document.getElementsByName("txt_precio_product[]")[position_cant].value = (precio_prod * mutli_cod).toFixed(2);

                        }
                    }
                }
                
                // Funcion multiplica el valor del producto X
                function extra_llanta(row_clicked) {

                    position_cant = false;
                    rows = document.getElementsByClassName("rowcantidadLlantas");
                    
                    for (i = 0, total = rows.length; i < total; i++) {
                        if (rows[i] === row_clicked) {
                            position_cant = i;
                            var precio_prod = document.getElementsByName("hidden_txt_valorLlantas[]")[position_cant].value;
                            var mutli_cod = document.getElementsByName("txt_cantidadLlantas[]")[position_cant].value; // Valor X multiplica

                            document.getElementsByName("txt_valorLlantas[]")[position_cant].value = (precio_prod * mutli_cod).toFixed(2);

                        }
                    }
                }
                
                
                // Establece el valor del IVA a calcular para los productos
                var iva = getiva();
                var isANT = false;
                function getiva() {

                    return 12;

                }

 
 
                function calcular_total_llantas() {
                //Suma de columna de valores
                var importe_total = 0;
                $(".importe_linea_llanta").each(
                        function(index, value) {
                                importe_total = importe_total + eval($(this).val());
                        }
                );
        
                $("#txt_subtotal_llantas").val(importe_total.toFixed(2));

                var iva_db = getiva();
                var iva = importe_total.toFixed(2)*iva_db/100;
                
                
                document.getElementById("txt_iva_llantas").value= iva.toFixed(2);

                var total_factura = importe_total + iva;
                document.getElementById("txt_total_llantas").value= total_factura.toFixed(2);
                
                var descuento = calcularDescuento_llantas(total_factura);
                var valrecargoFPago = calcularRecargo_Llantas(total_factura);
                
                var valor_apagar = (total_factura + valrecargoFPago) - descuento;
                document.getElementById("txt_apagar_llantas").value= valor_apagar.toFixed(2);

                return total_factura.toFixed(2);
                };
                
                
                // Funcion principal de calculo de totales (Productos)
                function calcular_total_productos() {
                //Suma de columna de valores
                var importe_total = 0;
                $(".importe_linea_producto").each(
                        function(index, value) {
                                importe_total = importe_total + eval($(this).val());
                        }
                );
        
                $("#txt_subtotal_productos").val(importe_total.toFixed(2));

                var iva_db = getiva();
                var iva = importe_total.toFixed(2)*iva_db/100;
                
                
                document.getElementById("txt_iva_productos").value= iva.toFixed(2);

                var total_factura = importe_total + iva;
                document.getElementById("txt_total_productos").value= total_factura.toFixed(2);
                
                var descuento = calcularDescuento_productos(total_factura);
                var valrecargoFPago = calcularRecargo_productos(total_factura);
                
                var valor_apagar = (total_factura + valrecargoFPago) - descuento;
                document.getElementById("txt_apagar_productos").value= valor_apagar.toFixed(2);

                return total_factura.toFixed(2);
                };
                
                
                
                function calcularDescuento_llantas(valor_factura){
                    var porcentaje = document.getElementById("txt_descuento_llantas").value;
                    var valor_descuento= (valor_factura.toFixed(2) * porcentaje/100);
                    return valor_descuento;
                }
                
                function calcularDescuento_productos(valor_factura){
                    var porcentaje = document.getElementById("txt_descuento_productos").value;
                    var valor_descuento= (valor_factura.toFixed(2) * porcentaje/100);
                    return valor_descuento;
                }
                
                function calcularRecargo_Llantas(valor_factura){
                    if( $('#chk_tarjetaCredito').prop('checked') || $('#chk_credito').prop('checked')  ) {
                        var porcentaje = 12;
                        var valor_recargo= (valor_factura.toFixed(2) * porcentaje/100);
                        return valor_recargo;  
                    }else{
                        return 0;
                    }
                }
                
                function calcularRecargo_productos(valor_factura){
                    if( $('#chk_tarjetaCredito').prop('checked') || $('#chk_credito').prop('checked')  ) {
                        var porcentaje = 12;
                        var valor_recargo= (valor_factura.toFixed(2) * porcentaje/100);
                        return valor_recargo;  
                    }else{
                        return 0;
                    }
                }
                
                
                    
                  
                  // Valida informacion de usuario ingresado
                function ajax_jsonDatosCliente(){
                    
                       var cod_usu_ing =document.getElementById("txt_ci_ruc").value;
                       
                        $.ajax({
                           type : 'get',
                            url : './views/modulos/ajax/json_cliente.php', 
                            dataType: "json",

                           data: {dato_ci: cod_usu_ing},

                        success : function(response)
                            {
                                     if(response.length!==0){
                                        document.getElementById("txt_cliente").value = response[0]['cliente'];
                                        document.getElementById("txt_direccion").value = response[0]['direccion'];
                                        document.getElementById("txt_direccion").value = response[0]['direccion'];
                                        document.getElementById("txt_telefono").value = response[0]['telefono'];
                                        document.getElementById("txt_correo").value = response[0]['correo'];
                                        $('select').material_select();
                                    }else{
                                        document.getElementById("txt_cliente").value = "- Sin Datos  -";
                                        document.getElementById("txt_direccion").value = "- Sin Datos -";
                                        document.getElementById("txt_telefono").value = "- Sin Datos -";
                                        document.getElementById("txt_correo").value = "- Sin Datos -";
                                         $('select').material_select();
                                    }
                            }
                        });
                    }; 
                   
                   
                   // Retorna los vehiculos del usuario indicado
                    function ajax_anulaOrdenTrabajo(this_elemento){
                        codOrdenT=this_elemento.id;
                        
                        $.ajax({
                           type : 'GET',
                            url : './views/modulos/ajax/funciones.php', 
                           data: {action:'anulaOrdenT',codOrdenT: codOrdenT},

                        success : function()
                            {
                                Materialize.toast('Documentos anulado: '+codOrdenT, 3000);  
                            }
                        });
                        
                    }; 
                    
                   
                   
                    // Retorna los vehiculos del usuario indicado
                    function ajax_getVehiculos(preselecionado){
                       var cod_usu_ing =document.getElementById("txt_ci_ruc").value;
                       
                        $.ajax({
                           type : 'GET',
                            url : './views/modulos/ajax/funciones.php', 
                           data: {action:'getAutos',dato_ci: cod_usu_ing, preselect:preselecionado, modeloAuto:""},

                        success : function(response)
                            {
                                    if(response.length!==0){
                                        document.getElementById("seleccion_vehiculo").innerHTML = response;
                                     $('select').material_select();
                                    }else{
                                        document.getElementById("seleccion_vehiculo").innerHTML = "";
                                       $('select').material_select();
                                    }
                            }
                        });
                    }; 
                    
                    
                    // Retorna options de select modelos
                    function ajax_getModelos(){
                       var valor_seleccionado =document.getElementById("seleccion_marcaauto").value;
                    
                        $.ajax({
                           type : 'GET',
                            url : './views/modulos/ajax/funciones.php', 
                           data: {action:'getModeloAutos',modeloAuto: valor_seleccionado},

                        success : function(response)
                            {
                                     if(response.length!==0){
                                     document.getElementById("seleccion_modeloauto").innerHTML = response;
                                     $('select').material_select();
                                    }else{
                                     document.getElementById("seleccion_modeloauto").innerHTML = "-- NO DATA --";
                                     $('select').material_select();
                                      
                                    }
                            }
                        });
                    }; 
                    
             
                    // Retorna options de select modelos
                    function ajax_getModelosLlantas(row_clicked){
                       
                        position = false;
                        // Obtener un conjunto HTML Objets
                        rows = document.getElementsByName("seleccion_marcaLlanta[]");
                       
                        for (i = 0, total = (rows.length); i <= total; i++) {
                           
                            if (rows[i] === row_clicked){ // Comparamos el objeto HTML con el conjunto de Objetos
                            position =  i; // Recuperamos posicion del elemento
                           
                           
                            var marca = document.getElementsByName("seleccion_marcaLlanta[]")[position].value;
                          

                             $.ajax({
                                type : 'GET',
                                 url : './views/modulos/ajax/funciones.php', 
                                data: {action:'getModelosLlantas',marca: marca},

                             success : function(response)
                                 {
                                        if(response.length!==0){
                                            document.getElementsByName("seleccion_modeloLlanta[]")[position].innerHTML = response;
                                          $('select').material_select();
                                         }else{
                                            document.getElementsByName("seleccion_modeloLlanta[]")[position].innerHTML = "-- NO DATA --";
                                          $('select').material_select();
                                         }
                                 }
                             });
                            }
                        }    
                    }; 
                    
                    // Retorna options de select modelos
                    function ajax_getMedidasLlantas(row_clicked){
                        
                        position = false;
                        // Obtener un conjunto HTML Objets
                        rows = document.getElementsByName("seleccion_modeloLlanta[]");
                       
                        for (i = 0, total = (rows.length); i <= total; i++) {
                           
                            if (rows[i] === row_clicked){ // Comparamos el objeto HTML con el conjunto de Objetos
                            position =  i; // Recuperamos posicion del elemento
                           
                            
                            var marca = document.getElementsByName("seleccion_marcaLlanta[]")[position].value;
                            var modelo = document.getElementsByName("seleccion_modeloLlanta[]")[position].value;

                            $.ajax({
                               type : 'GET',
                                url : './views/modulos/ajax/funciones.php', 
                               data: {action:'getMedidasLlantas',marca: marca ,modelo: modelo},

                            success : function(response)
                                {
                                         if(response.length!==0){
                                            document.getElementsByName("seleccion_medidaLlanta[]")[position].innerHTML = response;
                                         $('select').material_select();
                                        }else{
                                            document.getElementsByName("seleccion_medidaLlanta[]")[position].innerHTML = "-- NO DATA --";
                                         $('select').material_select();
                                        }
                                }
                            });
                            }
                        }    
                    }; 
                    
                    // Retorna options de select modelos
                    function ajax_getValorLlantas(row_clicked){
                        
                         position = false;
                        // Obtener un conjunto HTML Objets
                        rows = document.getElementsByName("seleccion_medidaLlanta[]");
                       
                        for (i = 0, total = (rows.length); i <= total; i++) {
                           
                            if (rows[i] === row_clicked){ // Comparamos el objeto HTML con el conjunto de Objetos
                            position =  i; // Recuperamos posicion del elemento
                            
                                var marca = document.getElementsByName("seleccion_marcaLlanta[]")[position].value;
                                var modelo = document.getElementsByName("seleccion_modeloLlanta[]")[position].value;
                                var medida = document.getElementsByName("seleccion_medidaLlanta[]")[position].value;
                                
                                //alert(mutli_cod);
                                $.ajax({
                                    type : 'GET',
                                    url : './views/modulos/ajax/funciones.php', 
                                    dataType: "json",
                                    data: {action:'getValorLlantas',marca: marca ,modelo: modelo, medida:medida},

                                        
                                    success : function(response)
                                    {   
                                      
                                        if(response.length!==0){
                                           
                                            document.getElementsByName("txt_cantidadLlantas[]")[position].value = 1;
                                            
                                            var costo_prod = response[0]['valor'];
                                            var costo_prod_fixed = (Math.round(costo_prod * 100) / 100).toFixed(2);
                                           
                                            document.getElementsByName("hidden_txt_CodLlantas[]")[position].value = response[0]['codigo'];
                                            document.getElementsByName("hidden_txt_valorLlantas[]")[position].value = costo_prod_fixed;
                                            document.getElementsByName("txt_valorLlantas[]")[position].value = costo_prod_fixed;
                                            calcular_total_llantas();
                                        }else{
                                            
                                            document.getElementsByName("txt_valorLlantas[]")[position].value = 0;
                                        }
                                    }
                                });
                                //Fin de AJAX
                            
                            
                            
                            }
                        }
                        
                        
                    }; 
                    
                    // Resetea un form con el id 
                    function resetForm (idForm){
                       document.getElementById(idForm).reset();  
                    }
                    
                    
                    //Calcula monto extra a la orden o la desgrosa en el valor
                    
                    function recargoFPago(valor_factura){
                            
                            if( $('#chk_tarjetaCredito').prop('checked') || $('#chk_tarjetaCredito').prop('checked')  ) {
                             var valor_recargoFPago= (valor_factura.toFixed(2) * 12/100);
                            return valor_recargoFPago; 
                            }else{
                               return 0;
                            }
                        
                         
                    }
                    
                    function mensajeRecargo(){
                        if( $('#chk_tarjetaCredito').prop('checked') || $('#chk_credito').prop('checked')  ) {
                            swal({  title: 'Forma de Pago',
                            text: 'Se ha indicado un pago a crédito se realizará un recargo extra del 12% al monto total',  
                            type: 'info',    
                            showCancelButton: false,   
                            closeOnConfirm: false,   
                            confirmButtonText: 'Aceptar', 
                            showLoaderOnConfirm: true } 
                            );
                            }
                     }
                     
                     function anularOrdenT(this_elemento){
                         codOrdenT=this_elemento.id;
                        
                            swal({
                            title: 'Anular orden?',
                            text: "Este proceso no se podrá revertir, anular orden: "+codOrdenT,
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, anular'
                          }).then(function () {
                              
                              $.ajax({
                                type : 'GET',
                                 url : './views/modulos/ajax/funciones.php', 
                                data: {action:'anulaOrdenT',codOrdenT: codOrdenT},

                                success : function()
                                 {
                                     swal(
                                    'Anulado!',
                                    'El documento se ha establecido como anulado.',
                                    'success'
                                  )
                                 }
                             });
                        
                              
                            
                          })
                         
                     }
                     
                     
                     
                    function testSwal(){
                            swal({  title: 'Test Swal Alert',
                            text: 'Este es un mensaje de prueba',  
                            type: 'info',    
                            showCancelButton: false,   
                            closeOnConfirm: false,   
                            confirmButtonText: 'Aceptar', 
                            showLoaderOnConfirm: true } 
                            );
                          
                     } 
                     
                     
                    
                    
                    