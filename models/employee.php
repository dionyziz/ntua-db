<?php
    class Employee {
        public static function create( $umn, $ssn, $name, $phone, $addr, $salary ) {
            try {
                return db_insert(
                    'employees',
                    compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' )
                );
            }
            catch ( DBException $e ) {
                throw new Duplicate();
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
        public static function update( $umn, $ssn = false, $name = false, $phone = false, $addr = false, $salary = false, $imageid = false ) {
            $fields = compact( 'ssn', 'name', 'phone', 'addr', 'salary', 'imageid' );

            foreach ( $fields as $field => $value ) {
                if ( $value === false ) {
                    unset( $fields[ $field ] );
                }
            }
            db_update( 'employees', compact( 'umn' ), $fields );
        }
        public static function item( $umn ) {
            return array_shift( db_select( 'employees', compact( 'umn' ) ) );
        }
    }
?>
