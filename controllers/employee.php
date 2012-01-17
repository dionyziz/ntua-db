<?php
    class EmployeeController {
        public function Listing() {
            $employees = employeeListing();
            view( 'employee/listing', array( 'employees' => $employees ) );
        }
        public function createView( $errors, ,$ssn, $name, $phone, $addr, $salary ) {
            $errors = array_flip( explode( ',', $errors ) );
            view( 'type/create', compact( 'errors', 'ssn', 'name', 'phone', 'addr', 'salary' ) );
        }
        public function create( $ssn, $name, $phone, $addr, $salary ) {
            $errors = array();
			if ( empty( $ssn ) ) {
                $errors[] = 'ssn';
            }
            if ( empty( $name ) ) {
                $errors[] = 'noname';
            }
            if ( empty( $phone ) ) {
                $errors[] = 'phone';
            }
            if ( empty( $addr ) ) {
                $errors[] = 'addr';
            }
			if ( empty( $salary ) ) {
                $errors[] = 'nosalary';
            }
            if ( !empty( $errors ) ) {
                Redirect( 'type/create?errors=' . implode( ',', $errors ) . '&ssn=' . $ssn .'&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
            }
            typeCreate( $ssn, $name, $phone, $addr, $salary );
        }
    }
?>
