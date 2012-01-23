$( "#reg_check" ).css( "display", "none" );
$( '#occ' ).change( function()  {
    $( "select option:selected").each( function () {
        if ( $( this ).text() == 'Διαχειριστής' ) {
            /* Need to do something here */
            $( "#reg_check" ).slideDown( "fast" ); //Slide Down checked field
        }
        else {
            $( "#reg_check" ).slideUp( "fast" ); //Slide Up
        }
    } );
} );
