<?php
    class PlanetypeController extends Controller {
        public static function listing() {
            $types = Planetype::listing();
            view( 'planetype/listing', compact( 'types' ) );
        }
        public static function createView( $errors, $tid, $name, $weight, $capacity ) {
            if ( !empty( $tid ) ) {
                $type = Planetype::item( $tid );
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
        public static function validateInput( $input ) {
            $args = array(
                'name'      => FILTER_FILTER_UNSAFE_RAW,
                'weight'    => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 1 )
                                    ),
                'capacity'  => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 1 )
                                    ),
            );
            $validated = filter_var_array( $input, $args );
            $validated2 = Controller::validateInput( $validated );
            return $validated2;
        }
        public static function create( $name, $weight, $capacity ) {
            $vars = compact( 'name', 'weight', 'capacity' );
            $errors = self::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Planetype::create( $name, $weight, $capacity );
            Redirect( 'planetype/listing' );
        }
        public static function delete( $tid ) {
            $vars = compact( 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/listing' );
            }
            Planetype::delete( $tid );
            Redirect( 'planetype/listing' );
        }
        public static function update( $tid, $name, $weight, $capacity ) {
            $vars = compact( 'tid', 'name', 'weight', 'capacity' );
            $errors = self::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'planetype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Planetype::update( $tid, $name, $weight, $capacity );
            Redirect( 'planetype/listing' );
        }
    }
?>
