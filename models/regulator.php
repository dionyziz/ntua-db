<?php
    class Regulator {
        public static function create( $umn, $checked ) {
            db_insert( 'regulators', compact( 'umn', 'checked' ) );
        }
        public static function listing() {
            return Employee::listing( 'regulator' );
        }
        public static function delete( $umn ) {
            db_delete( 'regulators', compact( 'umn' ) );
        }
        public static function item( $umn ) {
            return db_select( 'regulators', compact( 'umn' ) );
        }
    }
?>
