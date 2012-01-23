<?php
    class Specialization {
        public static function Create( $umn, $tid ) {
            db_insert( 'specializations', compact( 'umn', 'tid' ) );
        }
        public static function Listing() {
            return db_array(
                "SELECT
                    t.name AS tName, s.* , e.name AS eName
                FROM
                    specializations s
                INNER JOIN
                    planetypes t
                ON
                    t.tid = s.tid
                    INNER JOIN
                        employees e
                    ON
                        s.umn = e.umn
                ORDER BY eName"
            );
        }
        public static function Delete( $umn, $tid ) {
            db_delete( 'specializations', compact( 'umn', 'tid' ) );
        }
        public static function Item( $umn, $tid ) {
            return array_shift(
                db_array(
                    "SELECT
                        s.* , e.name AS eName, t.name AS tName 
                    FROM
                        specializations s
                    INNER JOIN
                        planetypes t
                    ON
                        t.tid = s.tid
                        INNER JOIN
                            employees e
                        ON
                            s.umn = e.umn
                        WHERE
                            s.tid = :tid
                            s.umn = :umn
                    LIMIT 1",
                    compact( 'umn', 'tid' )
                )
            );
        }
    }
?>
