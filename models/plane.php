<?php
    class Plane {
        public static function aggregates() {
            return db_array(
                "SELECT
                    name, p.tid, count( p.tid ) AS planeCount
                FROM
                    planes p
                CROSS JOIN
                    planetypes t ON t.tid = p.tid
                GROUP BY
                    name"
            );
        }
        public static function Create( $pid, $tid ) {
            db_insert( 'planes', compact( 'pid', 'tid' ) );
        }
        public static function Listing() {
            return db_array(
                "SELECT
                    t.*, p.*
                FROM
                    planes p
                CROSS JOIN
                    planetypes t ON t.tid = p.tid",
                array(),
                'pid'
            );
        }
        public static function Delete( $pid ) {
            db_delete( 'planes', compact( 'pid' ) );
        }
        public static function Update( $pid, $tid ) {
            db_update( 'planes', compact( 'pid' ), compact( 'tid' ) );
        }
        public static function Item( $pid ) {
            return mysql_fetch_array(
                db(
                    "SELECT
                        t.*, p.*
                    FROM
                        planes p
                    INNER JOIN
                        planetypes t
                    ON
                        p.tid = t.tid
                    WHERE
                        p.pid = :pid
                    LIMIT 1",
                    compact( 'pid' )
                )
            );
        }
    }
?>
