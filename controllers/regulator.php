<?php
    class regulatorController extends Controller {
        public static function listing() {
            $regulators = Regulator::listing();
            view( 'regulator/listing', array( 'regulators' => $regulators ) ); 
        }
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'regulator/listing' );
            }
            Regulator::delete( $umn );
            Redirect( 'regulator/listing' );
        }
    }
?>
