<?php
    class EmployeeController {
        public function Listing() {
            $employees = employeeListing();
            view( 'employee/listing', array( 'employees' => $employees ) );
        }
        public function createView( $errors, $ssn, $name, $phone, $addr, $salary ) {
            $errors = array_flip( explode( ',', $errors ) );
            view( 'employee/create', compact( 'errors', 'ssn', 'name', 'phone', 'addr', 'salary' ) );
        }
        public function create( $ssn, $name, $phone, $addr, $salary ) {
            $errors = array();
			if ( empty( $ssn ) ) {
                $errors[] = 'nossn';
            }
            if ( empty( $name ) ) {
                $errors[] = 'noname';
            }
            if ( empty( $phone ) ) {
                $errors[] = 'nophone';
            }
            if ( empty( $addr ) ) {
                $errors[] = 'noaddr';
            }
			if ( empty( $salary ) ) {
                $errors[] = 'nosalary';
            }
            if ( !empty( $errors ) ) {
                Redirect( '/employee/create?errors=' . implode( ',', $errors ) . '&ssn=' . $ssn . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
            }
            employeeCreate( $ssn, $name, $phone, $addr, $salary );
        }
    }
?>
