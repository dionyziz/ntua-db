<?php
    class Regulator {
        public static function create( $umn, $checked ) {
            db(
                "INSERT INTO
                    regulators
                SET
                    umn = :umn
                    checked = checked",
                compact( 'umn', 'checked' )
            );
        }
        public static function listing() {
            return Employee::listing( 'regulator' );
        }
        public static function delete( $umn ) {
            db(
                "DELETE FROM
                    regulators
                WHERE
                    umn = :umn
                LIMIT 1",
                compact( 'umn' )
            );
        }
        public static function item( $umn ) {
            return db_select( 'regulators', compact( 'umn' ) );
        }
    }
?>
