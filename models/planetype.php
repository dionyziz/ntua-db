<?php
    class Planetype {
        public static function create( $name, $weight, $capacity ) {
            db_insert( 'planetypes', compact( 'name', 'weight', 'capacity' ) );
        }
        public static function listing() {
            return db_select( 'planetypes', array(), array( '*' ), 'tid' );
        }
        public static function delete( $tid ) {
            db_delete( 'planetypes', compact( 'tid' ) );
        }
        public static function update( $tid, $name, $weight, $capacity ) {
            db_update(
                'planetypes',
                compact( 'tid' ),
                compact('name', 'weight', 'capacity' )
            );
        }
        public static function item( $tid ) {
            return array_shift( db_select( 'planetypes', compact( 'tid' ) ) );
        }
    }
?>
