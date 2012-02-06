<?php
    class CheckController extends Controller {
        public static function listing() {
            $checks = Check::listing();
            view( 'check/listing', array( 'checks' => $checks ) );
        }
        public static function createView( $errors, $checktypeid, $pid, $umn, $created, $duration, $score ) {
            if ( !empty( $checktypeid ) ) {
                $check = Check::item( $checktypeid, $pid, $umn );
                if  ( $check === false ) {
                    throw new Exception( 'The check you are trying to edit does not exist' );
                }
                if ( empty( $created ) ) {
                    $created = $check[ 'created' ];
                }
                if ( empty( $duration ) ) {
                    $duration = $check[ 'duration' ];
                }
                if ( empty( $score ) ) {
                    $score = $check[ 'score' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            $checktypes = Checktype::listing();
            $planes = Plane::listing();
            $techs = Tech::listing();
            $employees = Employee::listing( 'tech' );
            view( 'check/create', compact( 'errors', 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score', 'checktypes', 'planes', 'techs', 'employees' ) );
        }
        public static function create( $checktypeid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Check::create( $checktypeid, $pid, $umn, $created, $duration, $score);
            Redirect( 'check/listing' );
        }
        public static function delete( $checktypeid, $pid, $umn ) {
            $vars = compact( 'checktypeid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/listing' );
            }
            Check::delete( $checktypeid , $pid, $umn);
            Redirect( 'check/listing' );
        }
        public static function update( $checktypeid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Check::update( $checktypeid, $pid, $umn, $created, $duration, $score );
            Redirect( 'check/listing' );
        }
    }
?>
