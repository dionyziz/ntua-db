<?php
    class Tech {
        public static function Create( $umn ) {
            db_insert( 'techs', compact( 'umn' ) );
        }
        public static function Listing() {
            return Employee::Listing( 'tech' );
        }
        public static function Delete( $umn ) {
            db_delete( 'techs', compact( 'umn' ) );
        }
        public static function Item( $umn ) {
            return db_select( 'techs', compact( 'umn' ) );
        }
    }
?>
