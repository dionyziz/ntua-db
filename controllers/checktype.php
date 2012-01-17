<?php
    class ChecktypeController {
        public function Listing() {
            $checktypes = checktypeListing();
            view( 'checktype/listing', array( 'checktypes' => $checktypes ) );
        }
        public function createView( $errors, $name, $maxscore ) {
            $errors = array_flip( explode( ',', $errors ) );
            view( 'checktype/create', compact( 'errors', 'name', 'maxscore' ) );
        }
        public function create( $name, $maxscore ) {
            $errors = array();
            if ( empty( $name ) ) {
                $errors[] = 'noname';
            }
            if ( empty( $maxscore ) ) {
                $errors[] = 'nomaxscore';
            }
            if ( !empty( $errors ) ) {
                Redirect( 'checktype/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&maxscore=' . $maxscore );
            }
            checktypeCreate( $name, $maxscore );
        }
    }
?>
