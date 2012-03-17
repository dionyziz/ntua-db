<?php
    class EmployeeController extends Controller{
        public static function listing( $occ ) {
            global $settings;

            $employees = Employee::listing( $occ );
            foreach ( $employees as $i => $employee ) {
                if ( !empty( $employee[ 'imageid' ] ) ) {
                    $url = $settings[ 'uploadurl' ] . $employee[ 'imageid' ] . '.jpg';
                    $employees[ $i ][ 'imageurl' ] = $url;
                }
            }
            view( 'employee/listing', array( 'employees' => $employees , 'occ' => $occ) );
        }
        public function createView( $errors, $umn, $ssn, $name, $phone, $addr, $salary, $checked, $occ ) {
            if ( !empty( $umn ) ) {
                $employee = Employee::item( $umn );
                if ( $employee === false ) {
                    throw new Exception( 'The employee you are trying to edit does not exist' );
                }
                if ( empty( $ssn ) ) {
                    $ssn = $employee[ 'ssn' ];
                }
                if ( empty( $name ) ) {
                    $name = $employee[ 'name' ];
                }
                if ( empty( $phone ) ) {
                    $phone = $employee[ 'phone' ];
                }
                if ( empty( $addr ) ) {
                    $addr = $employee[ 'addr' ];
                }
                if ( empty( $salary ) ) {
                    $salary = $employee[ 'salary' ];
                }
                if ( empty( $occ ) ) {
                    $occ = $employee[ 'occ' ];
                }
                if ( empty( $checked ) ) {
                    $checked = $employee[ 'checked' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'employee/create', compact( 'errors', 'umn', 'ssn', 'name', 'phone', 'addr', 'salary', 'checked', 'occ' ) );
        }

        public static function validateInput( $input ) {
            $args = array(
                'umn'       => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 1 )
                                    ),
                'ssn'       => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 0 )
                                    ),
                'name'      => FILTER_FILTER_UNSAFE_RAW,
                'phone'     => array( 'filter'  => FILTER_VALIDATE_REGEXP,
                                      'options' => array( 'regexp'=> '#^([0-9()/+ -]*)$#' )
                                    ),
                'addr'      => FILTER_FILTER_UNSAFE_RAW,
                'salary'    => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 0 )
                                    ),
            );
            $validated = filter_var_array( $input, $args );
            $validated2 = Controller::validateInput( $validated );
            return $validated2;
        }

        public static function create( $umn, $ssn, $name, $phone, $addr, $salary, $occ, $photo ) {
            $vars = compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary', 'occ' );
            $errors = self::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            try {
                $employeeid = Employee::create( $umn, $ssn, $name, $phone, $addr, $salary, $occ, $checked );
            }
            catch ( Duplicate $e ) {
                $errors[] = 'duplicate';
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
            }
            if ( self::validUpload( $photo ) ) {
                var_dump( $photo );
                die;
                $imageid = Image::create( $photo[ 'tmp_name' ], 130, 130 );
                Employee::update( $umn, false, false, false, false, false, $imageid );
            }
            if ( $occ == 'tech' ) {
                Tech::create( $umn );
                Redirect( 'employee/listing?occ=tech' );
            }
            else if ( $occ == 'regulator' ) {
                Regulator::create( $umn, $checked );
                Redirect( 'employee/listing?occ=regulator' );
            }
            Redirect( 'employee/listing' );
        }
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/listing' );
            }
            Employee::delete( $umn );
            Redirect( 'employee/listing' );
        }
        public static function update( $umn, $newumn, $ssn, $name, $phone, $addr, $salary, $oldocc, $occ, $checked, $photo ) {
            $vars = compact( 'umn', 'newumn', 'ssn', 'name', 'phone', 'addr', 'salary', 'oldocc', 'occ', 'checked' );
            $errors = self::validateInput( $vars );
            if ( $newumn == 0 ) {
                Redirect( 'employee/create?errors=noumn&' . Controller::paramURL( $vars ) );
            }
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Employee::update( $umn, $newumn, $ssn, $name, $phone, $addr, $salary );
            if ( self::validUpload( $photo ) ) {
                $imageid = Image::create( $photo[ 'tmp_name' ], 130, 130 );
                Employee::update( $umn, false, false, false, false, false, false, $imageid );
            }
            if ( $oldocc != $occ ) {
                if ( $oldocc == 'tech' ) {
                    Tech::delete( $umn );
                }
                else if ( $oldocc == 'regulator' ) {
                    Regulator::delete( $umn );
                }
                if ( $occ == 'tech' ) {
                    Tech::create( $umn );
                    Redirect( 'employee/listing?occ=tech' );
                }
                else if ( $occ == 'regulator' ) {
                    Regulator::create( $umn, $checked );
                    Redirect( 'employee/listing?occ=regulator' );
                }
            }
            Redirect( 'employee/listing' );
        }
    }
?>
