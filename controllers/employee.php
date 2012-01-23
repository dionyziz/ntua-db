<?php
    class EmployeeController extends Controller{
        public static function listing( ) {
            $employees = employeeListing( '' );
            view( 'employee/listing', array( 'employees' => $employees ) );
        }
        public function createView( $errors, $umn, $ssn, $name, $phone, $addr, $salary, $occ ) {
            if ( !empty( $umn ) ) {
                $employee = employeeItem( $umn );
                if ( $employee === false ) {
                    throw new Exception( 'The employee you are trying to edit does not exist' ); }
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
                $employeeid = employeeCreate( $umn, $ssn, $name, $phone, $addr, $salary );
                if ( !empty( $photo ) ) {
                    $imageid = imageUpload( $photo[ 'tmp_name' ] );
                }
                employeeUpdate( $umn, $ssn, $name, $phone, $addr, $salary, $imageid );
            }
            catch ( Duplicate $e ) {
                $errors[] = 'duplicate';
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
            }
            if ( $occ == 'tech' ) {
                techCreate( $umn );
                Redirect( 'tech/listing' );
            }
            else if ( $occ == 'reg' ) {
                regulatorCreate( $umn, $checked );
                Redirect( 'regulator/create?&umn=' . $umn );
            }
            Redirect( 'employee/listing' );
        }
        public static function delete( $umn ) {
            $vars = compact( 'umn' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/listing' );
            }
            employeeDelete( $umn );
            Redirect( 'employee/listing' );
        }
        public static function update( $umn, $ssn, $name, $phone, $addr, $salary ) {
            $vars = compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            employeeUpdate( $umn, $ssn, $name, $phone, $addr, $salary );
            Redirect( 'employee/listing' );
        }
    }
?>
