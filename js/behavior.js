$( "#reg_check" ).css( "display", "none" );

$( '#occ' ).change( function()  {
    $( "select option:selected").each( function () {
        if ( $( this ).text() == 'Διαχειριστής' ) {
            $( "#reg_check" ).slideDown( "fast" ); //Slide Down checked field
        }
        else {
            $( "#reg_check" ).slideUp( "fast" ); //Slide Up
        }
    } );
} );

$( function() {
    $( "#datechecked" ).datepicker({ dateFormat: 'dd-mm-yy' });
    var dateFormat = $( "#datechecked" ).datepicker( "option", "dateFormat" );
    $( "#datechecked" ).datepicker( "option", "dateFormat", 'dd-mm-yy' );
} );
//    datepicker({ dateFormat: 'yy-mm-dd' });
//    var dateFormat = $( "#datecheckcreated" ).datepicker( "option", "dateFormat" );
//    $( "#datecheckcreated" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
$( function() {
$ ( "#datecheckcreated" ).AnyTime_picker( "created",
                        { formatUtcOffset: "%: (%@)",
                          hideInput: true,
                          placement: "popup" }
    );
} );

////Copied and slightly modified from http://blog.dynom.nl/archives/jQuery-simple-unordered-list-filter_20090624_39.html
//var My = {}
//My.List = {
//    Filter : function (inputSelector, listSelector) {
//         // Sanity check
//         var inp, rgx = new RegExp(), names = $( listSelector ), keys;
//         if (names.length === 0) {
//             return false;
//         }
//
//         // The list with keys to skip (esc, arrows, return, etc)
//         keys = [ 13, 27, 32, 37, 38, 39, 40 ];
//
//         // binding keyup to the unordered list
//         $( inputSelector ).bind( 'keyup' , function (e) {
//             if ( jQuery.inArray(e.keyCode, keys ) >= 0) {
//                 return false;
//             }
//             // Building the regex from our user input, 'inp' should be escaped
//             inp = $( this ).attr( 'value' );
//             rgx.compile( inp, 'im' );
//             names.each( function () {
//                 if ( rgx.source !== '' && !rgx.test( $( this ).html() ) ) {
//                     $( this ).parent( 'li' ).hide();
//                 }
//                 else {
//                     $( this ).parent( 'li' ).show();
//                 }
//             });
//         });
//     }
//};
//
//// When the DOM is ready
//$(document).ready(function () {
//    // Attach the filter to our input and list
//    My.List.Filter('input#search_filter', '#names>ul>li>a');
//});
