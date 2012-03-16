<?php
    class Check {
        public static function aggregates() {
            return db_array(
                "SELECT
                     c.pid AS pid, pt.name AS name, sum( c.score ) AS checkScore, sum( ct.maxscore ) AS maxScore
                 FROM
                     checks c
                 CROSS JOIN
                     planes p ON c.pid = p.pid
                 CROSS JOIN
                     planetypes pt ON p.tid = pt.tid
                 CROSS JOIN
                     checktypes ct ON c.checktypeid = ct.checktypeid
                 GROUP BY
                    c.pid
                 HAVING
                    sum( c.score ) < ( sum( ct.maxscore ) / 2 )"
            );
        }
        public static function create( $checktypeid, $pid, $umn, $created, $duration, $score) {
            db_insert(
                'checks',
                compact( 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score' )
            );
        }
        public static function listing() {
            return db_array(
                "SELECT
                     e.name AS techName, t.name AS planeTypeName,
                     ct.name AS checkTypeName, ct.maxscore,
                     c.*
                 FROM
                     checks c
                 CROSS JOIN
                     planes p ON c.pid = p.pid
                 CROSS JOIN
                     planetypes t ON p.tid = t.tid
                 CROSS JOIN
                     checktypes ct ON c.checktypeid = ct.checktypeid
                 CROSS JOIN
                     employees e ON e.umn = c.umn
                 ORDER BY c.pid"
            );
        }
        public static function delete( $checktypeid, $pid, $umn ) {
            db_delete( 'checks', compact( 'checktypeid', 'pid', 'umn' ) );
        }
        public static function update( $checktypeid, $pid, $umn, $created, $duration, $score ) {
            db_update(
                'checks',
                compact( 'checktypeid', 'pid', 'umn' ),
                compact( 'created', 'duration', 'score' )
            );
        }
        public static function item( $checktypeid, $pid, $umn ) {
            return array_shift(
                db_select( 'checks', compact( 'checktypeid', 'pid', 'umn' ) )
            );
        }
    }
?>
