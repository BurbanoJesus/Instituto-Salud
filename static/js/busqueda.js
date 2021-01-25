//Iniciar sesion
jQuery(document).on('submit','#form15',function(event){
  event.preventDefault();
  
  jQuery.ajax({
    url: '/instituto/core/includes/busqueda_familias.php',
    type: 'POST',
    dataType: 'text',
    data: $('#form15').serialize(),
    beforeSend:function(){
      // $('.botonlg').val('Validando1');
    }
  })
  .done(function(respuesta){
    console.log(respuesta);
    console.log(respuesta.length);
    if (respuesta.length > 0) {
      console.log(typeof(respuesta));
      $('.result_busq_fam').html(respuesta);
    }
  })
  .fail( function( jqXHR, textStatus, errorThrown ) {
          if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
          } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
          } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
          } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
          } else if (textStatus === 'timeout') {
            alert('Time out error.');
          } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
          } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
          }
        })
  .always(function(){
    // console.log('Complete');
  })
});

jQuery(document).on('submit','#form16',function(event){
  event.preventDefault();
  
  jQuery.ajax({
    url: '/instituto/core/includes/busqueda_filtros.php',
    type: 'POST',
    dataType: 'text',
    data: $('#form16').serialize(),
    beforeSend:function(){
      // $('.botonlg').val('Validando1');
    }
  })
  .done(function(respuesta){
    console.log(respuesta);
    console.log(respuesta.length);
    if (respuesta.length > 0) {
      console.log(typeof(respuesta));
      $('.result_busq').html(respuesta);
    }
  })
  .fail( function( jqXHR, textStatus, errorThrown ) {
          if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
          } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
          } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
          } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
          } else if (textStatus === 'timeout') {
            alert('Time out error.');
          } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
          } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
          }
        })
  .always(function(){
    // console.log('Complete');
  })
});

