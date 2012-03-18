<?php
    class Employee {
        public static function aggregates() {
            return db_array(
                "SELECT
                    occ, MIN( salary ) AS minimum, MAX( salary ) AS maximum, AVG( salary ) AS average
                FROM
                    workers
                GROUP BY
                    occ"
            );
        }
        public static function create( $umn, $ssn, $name, $phone, $addr, $salary, $occ, $checked ) {
            try {
                return db_insert(
                    'employees',
                    compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' )
                );
            }
            catch ( DBException $e ) {
                throw new Duplicate();
            }
            if ( $occ == 'tech' ) {
                return Tech::create( $umn );
            }
            else if ( $occ == 'regulator' ) {
                return Regulator::create ( $umn, $checked );
            }
        }
        public static function listing( $occ ) {
            $res = db(
                "SELECT
                    e.*, i.width, i.height, r.checked
                FROM
                    employees e
                LEFT JOIN
                    images i USING ( imageid )
                LEFT JOIN
                    techs t ON t.umn = e.umn
                LEFT JOIN
                    regulators r ON r.umn = e.umn
                WHERE
                    ( :occ = 'tech' AND t.umn IS NOT NULL )
                    OR ( :occ = 'regulator' AND r.umn IS NOT NULL )
                    OR ( :occ = '' )
                ORDER BY umn ",
                compact( 'occ' )
            );
            $rows = array();
            while ( $row = mysql_fetch_array( $res ) ) {
                $rows[ $row[ 'umn' ] ] = $row;
            }
            return $rows;
        }
        public static function delete( $umn ) {
            db_delete( 'employees', compact( 'umn' ) );
        }
        public static function update( $umn, $newumn = false, $ssn = false, $name = false, $phone = false, $addr = false, $salary = false, $imageid = false ) {
            $fields = compact( 'ssn', 'name', 'phone', 'addr', 'salary', 'imageid' );
            $fields[ 'umn' ] = $newumn;

            foreach ( $fields as $field => $value ) {
                if ( $value === false ) {
                    unset( $fields[ $field ] );
                }
            }
            db_update( 'employees', compact( 'umn' ), $fields );
        }
        public static function item( $umn ) {
            //return db_select_one( 'employees', compact( 'umn' ) );
            $res = db(
                "SELECT
                    'tech' as occ, e.*, i.width, i.height
                FROM
                    employees e
                LEFT JOIN
                    techs t ON t.umn = e.umn
                LEFT JOIN
                    images i USING ( imageid )
                WHERE
                    ( :umn = e.umn AND t.umn IS NOT NULL )
                LIMIT 1",
                    compact( 'umn' )
            );
            $ret = mysql_fetch_array( $res );
            if ( empty( $ret ) ) {
                $res = db(
                    "SELECT
                        'regulator' as occ, e.*, i.width, i.height, r.checked
                    FROM
                        employees e
                    LEFT JOIN
                        regulators r ON r.umn = e.umn
                    LEFT JOIN
                        images i USING ( imageid )
                    WHERE
                        ( :umn = e.umn AND r.umn IS NOT NULL )
                    LIMIT 1",
                        compact( 'umn' )
                );
                $ret = mysql_fetch_array( $res );
            }
            if ( empty( $ret ) ) {
                $res = db( // nested query required by exercise (do not change into simple join)
                    "SELECT
                        'other' AS occ, e.*, i.width, i.height
                    FROM
                        employees e,
                        (
                            SELECT
                                width, height
                            FROM
                                images
                            WHERE
                                imageid = e.imageid
                        ) i
                    WHERE
                        :umn = e.umn
                    LIMIT 1",
                        compact( 'umn' )
                );
                $ret = mysql_fetch_array( $res );
            }
            return $ret;
        }
    }
?>
