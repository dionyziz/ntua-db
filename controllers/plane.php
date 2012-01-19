<?php
    class PlaneController extends Controller {
        public static function Listing() {
            $planes = planeListing();
            $types = typeListing();
            view( 'plane/listing', array( 'planes' => $planes , 'types' => $types ) );
        }
        public static function createView( $errors, $pid, $tid ) {
            if ( !empty( $pid ) ) {
                $plane = planeItem( $pid );
                if ( $plane === false ) {
                    throw new Exception( 'The plane you are trying to edit does not exist' );
                }
                $errors = array_flip( explode( ',', $errors ) );
                $types = typeListing();
                view( 'plane/create', compact( 'errors', 'pid', 'tid', 'types' ) );
            }
        }
        public static function create( $pid, $tid ) {
            $vars = compact( 'pid', 'tid' );
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            planeCreate( $pid, $tid );
            Redirect( 'type/listing' );
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
