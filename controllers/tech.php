<?php
    class TechController extends Controller{
        public static function listing() {
            $techs = Tech::listing();
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
            Tech::delete( $umn );
            Redirect( 'tech/listing' );
        }
        public static function update( $umn ) {
            Redirect( 'employee/create?umn=' . $umn );
        }
    }
?>
