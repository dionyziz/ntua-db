<?php
    class EmployeeUnitTest extends UnitTest {
        public function setUp() {
        }
        public function testFunctions() {
            $this->assert( method_exists( 'Employee', 'create' ) );
            $this->assert( method_exists( 'Employee', 'delete' ) );
            $this->assert( method_exists( 'Employee', 'update' ) );
            $this->assert( method_exists( 'Employee', 'item' ) );
            $this->assert( method_exists( 'Employee', 'listing' ) );
        }
        public function testNonExistent() {
            $test = Employee::item( 987634893571519 );
            $this->assertEquals( false, $test, 'Passing non-existant ID to Employee::item, should return false' );
        }
        public function testCreate() {
            $id = Employee::create( 13141519, 113457, '13141519', '13141519', '13141519', '9001', 'tech', false );
            $this->assert( is_int( $id ), 'Created employee id must be an int' );
            $this->assert( $id > 0, 'Created employee id must be positive' );
            $item = Employee::item( $id );
            $this->assert( is_array( $item ), 'Employee created must be returned as an array' );
            $this->assert( isset( $item[ 'umn' ] ), 'Employee must have a umn' );
            $this->assert( $item[ 'umn' ] == 13141519, 'Employee umn returned is incorrect' );
            $this->assert( isset( $item[ 'ssn' ] ), 'Employee must have a ssn' );
            $this->assert( $item[ 'ssn' ] == 113457, 'Employee ssn returned is incorrect' );
            // etc.
            Employee::delete( $id );
            $item = Employee::item( $id );
            $this->assert( $item === false, 'After deleting an employee, they must no longer be returned' );
        }
        public function tearDown() {
        }
    }

    return new EmployeeUnitTest();
?>
