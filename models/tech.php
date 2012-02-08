<?php
    class Tech {
        public static function create( $umn ) {
            db_insert( 'techs', compact( 'umn' ) );
        }
        public static function listing() {
            return Employee::listing( 'tech' );
        }
        public static function delete( $umn ) {
            db_delete( 'techs', compact( 'umn' ) );
        }
        public static function item( $umn ) {
            return db_select( 'techs', compact( 'umn' ) );
        }
    }
?>
