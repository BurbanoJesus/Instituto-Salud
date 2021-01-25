//Iniciar sesion
jQuery(document).on('submit','#form0',function(event){
  event.preventDefault();
  
  jQuery.ajax({
    url: 'application/login.php',
    type: 'POST',
    dataType: 'json',
    data: $('#form0').serialize(),
    beforeSend:function(){
      // $('.botonlg').val('Validando1');
    }
  })
  .done(function(respuesta){
    console.log(respuesta.error);
    if(respuesta.error == false){
        console.debug('sigue');
        location.href = './views/inicio.php';
      }
    else {
      $('.error').html('Usuario y contraseña no encontrados').fadeIn('normal');
      // setTimeout(function(){
      //   $('.error').slideUp('slow');
      // },3000);
      // $('.botonlg').val('Iniciar Sesion'); 
    }
  })
  .fail(function(resp){
    console.log(resp.responseText);
  })
  .always(function(){
    // console.log('Complete');
  })
});

