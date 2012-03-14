<?php
    class ChecktypeController extends Controller {
        public static function listing() {
            $checktypes = Checktype::listing();
            view( 'checktype/listing', array( 'checktypes' => $checktypes ) );
        }
        public function createView( $errors, $checktypeid, $name, $maxscore ) {
            if ( !empty( $checktypeid ) ) {
                $checktype = Checktype::item( $checktypeid );
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
        public static function validateInput( $input ) {
            $args = array(
                'name'      => FILTER_FILTER_UNSAFE_RAW,
                'maxscore'  => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 1 )
                                    ),
            );
            $validated = filter_var_array( $input, $args );
            $validated2 = Controller::validateInput( $validated );
            return $validated2;
        }
        public static function create( $name, $maxscore ) {
            $vars = compact( 'name', 'maxscore' );
            $errors = self::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Checktype::create( $name, $maxscore );
            Redirect( 'checktype/listing' );
        }
        public static function delete( $checktypeid ) {
            $vars = compact( 'checktypeid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/listing' );
            }
            Checktype::delete( $checktypeid );
            Redirect( 'checktype/listing' );
        }
        public static function update( $checktypeid, $name, $maxscore ) {
            $vars = compact( 'checktypeid', 'name', 'maxscore' );
            $errors = self::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Checktype::update( $checktypeid, $name, $maxscore );
            Redirect( 'checktype/listing' );
        }
    }
?>
