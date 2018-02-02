 // Inicializacion de ventanas modales
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

 // Inicializacion select materialize
 $(document).ready(function() {
    $('select').material_select();
    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
  });
 

// inicializacion tabs 
$('#tabs-swipe-demo').tabs({ 'swipeable': true });

// Inicialización de sidenav movil menu
  $(".button-collapse").sideNav();
  
// Inicializacion de datepicker  
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    format: 'yyyy-mm-dd',
    clear: 'Limpiar',
    close: 'Ok',
    firstDay: true,
    closeOnSelect: true // Close upon selecting a date,
  });
  
 //Inicializacion de dropdown 
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );