<?php
    class TechController extends Controller{
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'tech/listing' );
            }
            Tech::delete( $umn );
            Redirect( 'tech/listing' );
        }
    }
?>
