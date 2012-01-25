<?php
    class regulatorController extends Controller {
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/listing?occ=regulator' );
            }
            Regulator::delete( $umn );
            Redirect( 'employee/listing?occ=regulator' );
        }
    }
?>
