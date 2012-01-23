<?php
    class PlaneController extends Controller {
        public static function listing() {
            $planes = planeListing();
            view( 'plane/listing', array( 'planes' => $planes ) );
        }
        public static function createView( $errors, $pid, $tid ) {
            if ( !empty( $pid ) ) {
                $plane = planeItem( $pid );
                if ( $plane === false ) {
                    throw new Exception( 'The plane you are trying to edit does not exist' );
                }
                if ( empty( $tid ) ) {
                    $tid = $plane[ 'tid' ];
                }
            }
            $planetypes = planetypeListing();
            $errors = array_flip( explode( ',', $errors ) );
            view( 'plane/create', compact( 'errors', 'pid', 'tid', 'planetypes' ) );
        }
        public static function create( $pid, $tid ) {
            $vars = compact( 'pid', 'tid' );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            planeCreate( $pid, $tid );
            Redirect( 'plane/listing' );
        }
        public static function delete( $pid ) {
            $vars = compact( 'pid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/listing' );
            }
            planeDelete( $pid );
            Redirect( 'plane/listing' );
        }
        public static function update( $pid, $tid ) {
            $vars = compact( 'pid', 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            planeUpdate( $pid, $tid );
            Redirect( 'plane/listing' );
        }
    }

?>
