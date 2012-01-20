<?php
    class CheckController extends Controller {
        public static function listing() {
            $checks = checkListing();
            $checktypes = checktypeListing();
            view( 'check/listing', array( 'checks' => $checks , 'checktypes' => $checktypes , 'planes' => $planes ) );
        }
        public static function createView( $errors, $chkid, $pid, $umn, $created, $duration, $score) {
            $errors = array_flip( explode( ',', $errors ) );
            $checktypes = checktypeListing();
            $planes = planeListing();
            view( 'check/create', compact( 'errors', 'chkid', 'pid', 'umn', 'created', 'duration', 'score', 'checktypes', 'planes') );
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
