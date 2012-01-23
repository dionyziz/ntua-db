<?php
    class PlaneController extends Controller {
        public static function listing() {
            $planes = Plane::listing();
            view( 'plane/listing', array( 'planes' => $planes ) );
        }
        public static function createView( $errors, $pid, $tid ) {
            if ( !empty( $pid ) ) {
                $plane = Plane::item( $pid );
                if ( $plane === false ) {
                    throw new Exception( 'The plane you are trying to edit does not exist' );
                }
                if ( empty( $tid ) ) {
                    $tid = $plane[ 'tid' ];
                }
            }
            $planetypes = Planetype::listing();
            $errors = array_flip( explode( ',', $errors ) );
            view( 'plane/create', compact( 'errors', 'pid', 'tid', 'planetypes' ) );
        }
        public static function create( $pid, $tid ) {
            $vars = compact( 'pid', 'tid' );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Plane::create( $pid, $tid );
            Redirect( 'plane/listing' );
        }
        public static function delete( $pid ) {
            $vars = compact( 'pid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/listing' );
            }
            Plane::delete( $pid );
            Redirect( 'plane/listing' );
        }
        public static function update( $pid, $tid ) {
            $vars = compact( 'pid', 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Plane::update( $pid, $tid );
            Redirect( 'plane/listing' );
        }
    }
?>
