$(window).on( 'load', function(){
    $( '.simplemap .simplemap-content' ).each( function( index, element ){
        test( 'Simple Map Test ('+index+')', function() {
            deepEqual( 1, $( '.gm-style', element ).length, 'Can\'t load Google Maps at #'+index+'.' );
        } );
    } );
} );
