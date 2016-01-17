jQuery(document).ready(function($) {

  var form = $('#form-export');
  var pageTitle = $( 'div h1' );
  var animation = $( '#loading-animation' );

  form.submit(function(event){
    animation.show();
    console.log('submit');
    event.preventDefault();

    var formData = $(form).serialize();
    console.log(formData);
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'export',
        data: formData,
        security: MIEMBROS.security
      },
      success: function( response ) {
          $( 'div#message' ).remove();
          animation.hide();
          if( true === response.success ) {
						pageTitle.after( "<div id='message' class='updated'><p>Archivo generado correctamente <a href='"+response.data+"'>Descargar</a></p></div>" );
					} else {
						pageTitle.after( "<div id='message' class='error'> <p>Ha ocurrido un error</p></div>" );
					}
          console.log(message);
			},
      error: function( error ) {
          $( 'div#message' ).remove();
          animation.hide();
          console.log(error);
          pageTitle.after( "<div id='message' class='error'> <p>Ha ocurrido un error</p></div>" );			}
    });

  });


});
