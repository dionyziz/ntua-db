<?php
    class Planetype {
        public static function Create( $name, $weight, $capacity ) {
            db_insert( 'planetypes', compact( 'name', 'weight', 'capacity' ) );
        }
        public static function Listing() {
            $res = db_select( 'planetypes', array(), array( '*' ), 'tid' );
        }
        public static function Delete( $tid ) {
            db_delete( 'planetypes', compact( 'tid' ) );
        }
        public static function Update( $tid, $name, $weight, $capacity ) {
            db_update(
                'planetypes',
                compact( 'tid' ),
                compact('name', 'weight', 'capacity' )
            );
        }
        public static function Item( $tid ) {
            return array_shift( db_select( 'planetypes', compact( 'tid' ) ) );
        }
    }
?>
