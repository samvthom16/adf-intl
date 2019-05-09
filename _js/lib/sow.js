jQuery("[data-toggle~=modal]").each( function(){

  var $button = jQuery( this );

  $button.click( function( ev ){
    ev.preventDefault();

    var $modal = jQuery( $button.attr( 'href' ) );

    $modal.addClass('open');
  });

});

jQuery("[data-behaviour~=inline-modal]").each( function(){
  var $modal = jQuery( this ),
    $overlay = $modal.find( '.inline-overlay' ),
    $closeBtn = $modal.find( 'button.close' );

    $overlay.click( function( ev ){
      hideModal();
    });

    $closeBtn.click( function( ev ){
      ev.preventDefault();
      hideModal();
    });

    function hideModal(){
      console.log('hide modal');
      $modal.removeClass('open');
    }

});
