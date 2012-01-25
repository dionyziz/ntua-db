<?php
    /*
        A simple unit testing framework for PHP.
        Developer: Dionysis Zindros
    */

    class UnitTestFailed extends Exception {}

    abstract class UnitTest {
        final public function run() {
            $this->setUp();
            $reflect = new ReflectionClass( $this );
            $methods = $reflect->getMethods();
            $result = new UnitTestResult( $reflect->name );

            foreach ( $methods as $method ) {
                if ( $method->isPublic() && substr( $method->name, 0, 4 ) == 'test' ) {
                    $call = $method->name;
                    $testcase = new UnitTestcase( $method->name );
                    try {
                        $this->$call();
                        $testcase->pass();
                    }
                    catch ( UnitTestFailed $e ) {
                        $testcase->fail( $e->getMessage() );
                    }
                    $result->addTestcase( $testcase );
                }
            }

            $this->tearDown();

            return $result;
        }
        final protected function assert( $condition, $description = '' ) {
            if ( !$condition ) {
                throw new UnitTestFailed( $description );
            }
        }
        public function setUp() {
        }
        public function tearDown() {
        }
    }

    class UnitTestResult {
        public $name;
        public $testcases;

        public function addTestcase( UnitTestcase $testcase ) {
            $this->testcases[] = $testcase;
        }
        public function __construct( $name ) {
            $this->testcases = array();
            $this->name = $name;
        }
    }

    class UnitTestcase {
        public $name;
        public $passed; 
        public $failReason;

        public function pass() {
            $this->passed = true;
        }
        public function fail( $reason ) {
            $this->failReason = $reason;
            $this->passed = false;
        }
        public function __construct( $name ) {
            $this->name = $name;
        }
    }
?>
