<?php
    class ChecktypeController extends Controller {
        public static function listing() {
            $checktypes = checktypeListing();
            view( 'checktype/listing', array( 'checktypes' => $checktypes ) );
        }
        public function createView( $errors, $checktypeid, $name, $maxscore ) {
            if ( !empty( $checktypeid ) ) {
                $checktype = checktypeItem( $checktypeid );
                if ( $checktype === false ) {
                    throw new Exception( 'The checktype you are trying to edit does not exist' );
                }
                if ( empty( $name ) ) {
                    $name = $checktype[ 'name' ];
                }
                if ( empty( $maxscore ) ) {
                    $maxscore = $checktype[ 'maxscore' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'checktype/create', compact( 'errors', 'checktypeid', 'name', 'maxscore' ) );
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
        public static function delete( $checktypeid ) {
            $vars = compact( 'checktypeid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/listing' );
            }
            checktypeDelete( $checktypeid );
            Redirect( 'checktype/listing' );
        }
        public static function update( $checktypeid, $name, $maxscore ) {
            $vars = compact( 'checktypeid', 'name', 'maxscore' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            checktypeUpdate ( $checktypeid, $name, $maxscore );
            Redirect( 'checktype/listing' );
        }
    }
?>
