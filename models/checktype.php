<?php
    class Checktype {
        public static function create( $name, $maxscore ) {
            return db_insert( 'checktypes', compact( 'name', 'maxscore' ) );
        }
        public static function listing() {
            return db_select( 'checktypes', array(), array( '*' ), 'checktypeid' );
        }
        public static function delete( $checktypeid ) {
            db_delete( 'checktypes', compact( 'checktypeid' ) );
        }
        public static function update( $checktypeid, $name, $maxscore ) {
            db_update(
                'checktypes',
                compact( 'checktypeid' ),
                compact( 'name', 'maxscore' )
            );
        }
        public static function Item( $checktypeid ) {
            return array_shift( db_select( 'checktypes', compact( 'checktypeid' ) ) );
        }
    }
?>
