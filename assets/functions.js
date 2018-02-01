$(document).ready(function() {
   
     $('#myDatepickerINI, #myDatepickerFIN ').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'es',
        ignoreReadonly: true,
        allowInputToggle: true
    });
    
    //Asignacion de Eventos a elementos de UI
    $("#btn_buscar_edocs").on('click', function() {
            searchEDOCS();
        });
    
    //Comprobacion de archivo PDF en hosting
    
    $("#resultados_ajaxDocs").on('click','a.generapdf', function() {
        var doc_pdf = $(this).attr('href');
        //var test_doc = 'http://localhost:8080/docwf/ride/RIDE_2301201801179219085100120050050000972801234567810.pdf';
        
        if (myfile_exists(doc_pdf)){
            
                new PNotify({
                  title: 'Documento encontrado',
                  text: 'Su documento se encuentra Autorizado!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
            
               return true;
           }else{
               
               new PNotify({
                  title: 'Documento no encontrado',
                  text: 'Documento en proceso de autorización del SRI. El proceso de autorizacion puede durar hasta 24 horas. Reintente mas tarde',
                  delay: 3000,
                  type: 'warning',
                  styling: 'bootstrap3'
              });
               return false;
           }
    
    });
    
    
    
        
    //Comprobacion de archivo XML    en hosting
     $("#resultados_ajaxDocs").on('click','a.generaxml', function() { 
        var doc_xml = $(this).attr('href');
        //var test_xml = 'http://localhost:8080/docwf/xml/2203201601179219085100120070050000256571234567812.xml';
        
        if (myfile_exists(doc_xml)){
            
                new PNotify({
                  title: 'Documento encontrado',
                  text: 'Su documento se encuentra Autorizado!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
            
               return true;
           }else{
               
               new PNotify({
                  title: 'Documento no encontrado',
                  text: 'Documento en proceso de autorización del SRI. El proceso de autorizacion puede durar hasta 24 horas. Reintente mas tarde',
                  delay: 3000,
                  type: 'warning',
                  styling: 'bootstrap3'
              });
               return false;
           }
    });     
    
    
});

    
    function jqFileExist(url){
        $.ajax({
                url: url,
                type:'HEAD',
                error: function()
                {
                    console.log('No Existe: '+this.url);
                },
                success: function()
                {
                    console.log('Existe');
                }
            });
    }

    function searchEDOCS(){
        var fecha_INI = $('#txtDatepickerINI').val();
        var fecha_FIN = $('#txtDatepickerFIN').val();
        var typoDOC = $('#selectTypoDoc1').val();
        
         new PNotify({
                  title: 'Buscando, espere por favor',
                  text: 'Buscandos documentos. \<br> Del '+ fecha_INI + " al " + fecha_FIN,
                  delay: 5000,
                  type: 'info',
                  styling: 'bootstrap3'
         });
        
       
        $.ajax({
                  url : 'views/modulos/ajax/json_getalldocuments.php', 
                  method : 'POST',
                  data: {fecha_INI: fecha_INI, fecha_FIN: fecha_FIN, typoDOC:typoDOC},
               success: function (result) {
                   $('#resultados_ajaxDocs').html(result);
                   
                   }
               });
        
    }
    
    
    function myfile_exists (url) {
    var req = this.window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
    if (!req) {
      throw new Error('XMLHttpRequest not supported');
    }
    // HEAD Results are usually shorter (faster) than GET
    req.open('HEAD', url, false);
    req.send(null);
    if (req.status == 200) {
        return true;
    }
    return false;
  }
