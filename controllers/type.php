<?php
    class TypeController {
        public function Listing() {
            $types = typeListing();
            view( 'type/listing', array( 'types' => $types ) );
        }
        public function createView( $errors, $name, $weight, $capacity ) {
            $errors = array_flip( explode( ',', $errors ) );
            view( 'type/create', compact( 'errors', 'name', 'weight', 'capacity' ) );
        }
        public function create( $name, $weight, $capacity ) {
            $errors = array();
            if ( empty( $name ) ) {
                $errors[] = 'noname';
            }
            if ( empty( $weight ) ) {
                $errors[] = 'noweight';
            }
            if ( empty( $capacity ) ) {
                $errors[] = 'nocapacity';
            }
            if ( !empty( $errors ) ) {
                Redirect( 'type/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&weight=' . $weight . '&capacity=' . $capacity );
            }
            typeCreate( $name, $weight, $capacity );
        }
    }
?>
