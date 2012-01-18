<?php
    class TypeController extends Controller {
        public static function Listing() {
            $types = typeListing();
            view( 'type/listing', array( 'types' => $types ) );
        }
        public static function createView( $errors, $tid, $name, $weight, $capacity ) {
            if ( !empty( $tid ) ) {
                $type = typeItem( $tid );
                if ( $type === false ) {
                    throw new Exception( 'The type you are trying to edit does not exist' );
                }
                if ( empty( $name ) ) {
                    $name = $type[ 'name' ];
                }
                if ( empty( $weight ) ) {
                    $weight = $type[ 'weight' ];
                }
                if ( empty( $capacity ) ) {
                    $capacity = $type[ 'capacity' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'type/create', compact( 'errors', 'tid', 'name', 'weight', 'capacity' ) );
        }
        public static function create( $name, $weight, $capacity ) {
            $vars = compact( 'name', 'weight', 'capacity' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'type/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            typeCreate( $name, $weight, $capacity );
            Redirect( 'type/listing' );
        }
        public static function delete( $tid ) {
            $vars = compact( 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'type/listing' );
            }
            typeDelete( $tid );
            Redirect( 'type/listing' );
        } 
        public static function update( $tid, $name, $weight, $capacity ) {
            $vars = compact( 'tid', 'name', 'weight', 'capacity' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'type/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            typeUpdate( $tid, $name, $weight, $capacity );
            Redirect( 'type/listing' );
        }
    }
?>
