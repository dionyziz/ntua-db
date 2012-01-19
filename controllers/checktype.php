<?php
    class ChecktypeController extends Controller {
        public static function Listing() {
            $checktypes = checktypeListing();
            view( 'checktype/listing', array( 'checktypes' => $checktypes ) );
        }
        public function createView( $errors, $chkid, $name, $maxscore ) {
			if ( !empty( $chkid ) ) {
                $checktype = checktypeItem( $umn );
                if ( $checktype === false ) {
                    throw new Exception( 'The checktype you are trying to edit does not exist' );
                }
				if ( empty( $name ) ) {
                    $name = $checktype[ 'name' ];
                }
                if ( empty( $maxscore ) ) {
                    $maxscore = $checktype[ 'maxscore' ];
                }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'checktype/create', compact( 'errors', 'chkid', 'name', 'maxscore' ) );
        }
        public static function create( $name, $maxscore ) {
            $vars = compact( 'name', 'maxscore' );
			$errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            checktypeCreate( $name, $maxscore );
			Redirect( 'checktype/listing' );
        }
		public static function delete( $chkid ) {
            $vars = compact( 'chkid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/listing' );
            }
            checktypeDelete( $chkid );
            Redirect( 'checktype/listing' );
        }
		public static function update( $chkid, $name, $maxscore ) {
            $vars = compact( 'chkid', 'name', 'maxscore' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            checktypeUpdate ( $chkid, $name, $maxscore );
            Redirect( 'checktype/listing' );
    }
?>
