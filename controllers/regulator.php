<?php
    class regulatorController extends Controller{
        public static function listing( ) {
            $regulators = regulatorListing( );
            view( 'regulator/listing', array( 'regulators' => $regulators ) ); 
        }
        public function createView( $errors ) {
            Redirect( 'employee/create' );
        }
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'regulator/listing' );
            }
            regulatorDelete( $umn );
            Redirect( 'regulator/listing' );
        }
        public static function update( $umn ) {
            Redirect( 'employee/create?umn=' . $umn );
        }
    }
?>