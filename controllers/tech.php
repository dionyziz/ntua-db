<?php
    class techController extends Controller{
        public static function Listing() {
            $techs = techListing();
            view( 'tech/listing', array( 'techs' => $techs ) );
        }
        public function createView( $errors ) {
			if ( !empty( $umn ) ) {
                $tech = techItem( $umn );
                if ( $tech === false ) {
                    throw new Exception( 'The tech you are trying to edit does not exist' );
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'tech/create', compact( 'errors', 'umn' ) );
        }
        public static function create() {
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