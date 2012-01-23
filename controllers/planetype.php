<?php
    class PlanetypeController extends Controller {
        public static function listing() {
            $types = planetypeListing();
            view( 'planetype/listing', array( 'types' => $types ) );
        }
        public static function createView( $errors, $tid, $name, $weight, $capacity ) {
            if ( !empty( $tid ) ) {
                $type = planetypeItem( $tid );
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
            view( 'planetype/create', compact( 'errors', 'tid', 'name', 'weight', 'capacity' ) );
        }
        public static function create( $name, $weight, $capacity ) {
            $vars = compact( 'name', 'weight', 'capacity' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            planetypeCreate( $name, $weight, $capacity );
            Redirect( 'planetype/listing' );
        }
        public static function delete( $tid ) {
            $vars = compact( 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/listing' );
            }
            planetypeDelete( $tid );
            Redirect( 'planektype/listing' );
        }
        public static function update( $tid, $name, $weight, $capacity ) {
            $vars = compact( 'tid', 'name', 'weight', 'capacity' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            planetypeUpdate( $tid, $name, $weight, $capacity );
            Redirect( 'planetype/listing' );
        }
    }
?>
