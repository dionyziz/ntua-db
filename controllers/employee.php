<?php
    class EmployeeController extends Controller{
        public static function listing( ) {
            global $settings;

            $employees = Employee::listing();
            foreach ( $employees as $i => $employee ) {
                if ( !empty( $employee[ 'imageid' ] ) ) {
                    $url = $settings[ 'uploadurl' ] . $employee[ 'imageid' ] . '.jpg';
                    $employees[ $i ][ 'imageurl' ] = $url;
                }
            }
            view( 'employee/listing', array( 'employees' => $employees ) );
        }
        public function createView( $errors, $umn, $ssn, $name, $phone, $addr, $salary, $occ ) {
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
            }
            $errors = array_flip( explode( ',', $errors ) );
            view( 'employee/create', compact( 'errors', 'umn', 'ssn', 'name', 'phone', 'addr', 'salary', 'occ' ) );
        }
        public static function create( $umn, $ssn, $name, $phone, $addr, $salary, $occ, $photo ) {
            $vars = compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary', 'occ' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            try {
                $employeeid = Employee::create( $umn, $ssn, $name, $phone, $addr, $salary );
            }
            catch ( Duplicate $e ) {
                $errors[] = 'duplicate';
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
            }
            if ( !empty( $photo ) ) {
                $imageid = Image::create( $photo[ 'tmp_name' ], 130, 130 );
                Employee::update( $umn, false, false, false, false, false, $imageid );
            }
            if ( $occ == 'tech' ) {
                Tech::create( $umn );
                Redirect( 'tech/listing' );
            }
            else if ( $occ == 'reg' ) {
                Regulator::create( $umn, $checked );
                Redirect( 'regulator/listing' );
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
        public static function update( $umn, $ssn, $name, $phone, $addr, $salary, $photo ) {
            $vars = compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Employee::update( $umn, $ssn, $name, $phone, $addr, $salary );
            if ( !empty( $photo ) ) {
                $imageid = Image::create( $photo[ 'tmp_name' ], 130, 130 );
                Employee::update( $umn, false, false, false, false, false, $imageid );
            }
            Redirect( 'employee/listing' );
        }
    }
?>
