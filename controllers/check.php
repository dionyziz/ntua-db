<?php
    class CheckController extends Controller {
        public static function Listing() {
            $checks = checkListing();
            $checktypes = checktypeListing();
            $techs = employeeListing( 'tech' );
            view( 'check/listing', array( 'checks' => $checks , 'checktypes' => $checktypes , 'planes' => $planes , 'techs' => $employees ) );
        }
        public static function createView( $errors, $chkid, $pid, $umn, $created, $duration, $score ) {
            if ( !empty( $chkid ) ) {
                $check = checkItem( $chkid, $pid, $umn );
                if  ( $check === false ) {
                    throw new Exception( 'The check you are trying to edit does not exist' );
                }
                if ( empty ( $created ) ) {
                    $created = $check[ 'created' ];
                }
                if ( empty ( $duration ) ) {
                    $duration = $check[ 'duration' ];
                }
                if ( empty ( $score ) ) {
                    $score = $check[ 'score' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            $checktypes = checktypeListing();
            $planes = planeListing();
            $employees = employeeListing( '' );
            view( 'check/create', compact( 'errors', 'chkid', 'pid', 'umn', 'created', 'duration', 'score', 'checktypes', 'planes', 'employees' ) );
        }
        public static function create( $chkid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'chkid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            checkCreate( $chkid, $pid, $umn, $created, $duration, $score);
            Redirect( 'check/listing' );
        }
        public static function delete( $chkid, $pid, $umn ) {
            $vars = compact( 'chkid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/listing' );
            }
            checkDelete( $chkid , $pid, $umn);
            Redirect( 'check/listing' );
        } 
        public static function update( $chkid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'chkid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            checkUpdate( $chkid, $pid, $umn, $created, $duration, $score );
            Redirect( 'check/listing' );
        }
    }
?>
