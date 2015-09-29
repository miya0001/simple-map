$(window).on( 'load', function(){
      $( '.simplemap .simplemap-content' ).each( function( index, map ){
          test( 'Simple Map Test ('+index+')', function() {
              deepEqual( 1, $( 'div.gm-style', map ).length, '`div.gm-style` should be at #'+index+'.' );
          } );
      } );
} );
