<?php
    class PlaneController {
        public function Listing() {
            $planes = planeListing();
            $types = typeListing();
            view( 'plane/listing', array( 'planes' => $planes , 'types' => $types ) );
        }
        public function createView( $errors, $pid, $tid ) {
            $errors = array_flip( explode( ',', $errors ) );
            $types = typeListing();
            view( 'plane/create', compact( 'errors', 'pid', 'tid', 'types' ) );
        }
        public function create( $pid, $tid ) {
            $errors = array();
            if ( empty( $pid ) ) {
                $errors[] = 'nopid';
            }
            if ( empty( $pid ) ) {
                $errors[] = 'notid';
            }
            if ( !empty( $errors ) ) {
                Redirect( 'plane/create?errors=' . implode( ',', $errors ) . '&pid=' . $pid . '&tid=' . $tid );
            }
            planeCreate( $pid, $tid );
        }
    }

?>
