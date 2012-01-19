<?php
    class techController extends Controller{
        public static function Listing() {
            $techs = techListing();
            view( 'tech/listing', array( 'techs' => $techs ) );
        }
        public function createView( $errors ) {
            Redirect( 'employee/create' );
        }
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'tech/listing' );
            }
            techDelete( $umn );
            Redirect( 'tech/listing' );
        }
        public static function update( $umn ) {
            Redirect( 'employee/create?umn=' . $umn );
        }
    }
?>
