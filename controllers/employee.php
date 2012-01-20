<?php
    class EmployeeController extends Controller{
        public static function Listing() {
            $employees = employeeListing();
            view( 'employee/listing', array( 'employees' => $employees ) );
        }
        public function createView( $errors, $umn, $ssn, $name, $phone, $addr, $salary, $occ ) {
            if ( !empty( $umn ) ) {
                $employee = employeeItem( $umn );
                if ( $employee === false ) {
                    throw new Exception( 'The employee you are trying to edit does not exist' );/                }
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
        public static function create( $umn, $ssn, $name, $phone, $addr, $salary, $occ ) {
            $vars = compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary', 'occ' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            employeeCreate( $umn, $ssn, $name, $phone, $addr, $salary, $errors );
            if ( $occ == 'Technician' ) {
                techCreate( $umn );
                Redirect( 'employee/listing?tech=yes' );
            //} elseif ( $occ == 'Regulator' ) {
            //    regulatorCreate ( $umn );
            //    Redirect( 'employee/listing?regulator=yes' );
            } else Redirect( 'employee/listing' );
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
