<?php
    class CheckController {
        public function Listing() {
            $checks = checkListing();
            $checktypes = checktypeListing();
            view( 'check/listing', array( 'checks' => $checks , 'checktypes' => $checktypes ) );
        }
        public function createView( $errors, $chkid, $pid, $umn, $created, $duration, $score) {
            $errors = array_flip( explode( ',', $errors ) );
            $checktypes = checktypeListing();
            view( 'check/create', compact( 'errors', 'chkid', 'pid', 'umn', 'created', 'duration', 'score' , 'checktypes') );
        }
        public function create( $chkid, $pid, $umn, $created, $duration, $score) {
            $errors = array();
            if ( empty( $chkid ) ) {
                $errors[] = 'nochkid';
            }
            if ( empty( $pid ) ) {
                $errors[] = 'nopid';
            }
            if ( empty( $umn ) ) {
                $errors[] = 'noumn';
            }
            if ( empty( $created ) ) {
                $errors[] = 'nocreated';
            }
            if ( empty( $duration ) ) {
                $errors[] = 'noduration';
            }
            if ( empty( $score ) ) {
                $errors[] = 'noscore';
            }
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&chkid' . $chkid . '&pid' . $pid . '&umn' . $umn . '&created' . $created . '&duration' . $duration . '&score' . $score );
            }
            checkCreate( $chkid, $pid, $umn, $created, $duration, $score);
        }
    }
?>
