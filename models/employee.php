<?php
    function employeeCreate( $umn, $ssn, $name, $phone, $addr, $salary, $errors ) {
                try{
                    db(
                        "INSERT INTO
                            employees
                        SET
                            umn = :umn,
                            ssn = :ssn,
                            name = :name,
                            phone = :phone,
                            addr = :addr,
                            salary = :salary",
                            compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' )
                    );
                }
                catch ( DBException $e ) {
                    $errors[] = 'duplicate';
                    Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
                }
    }

    function employeeListing( $occ ) {
        $res = db(
            "SELECT
                e.*
            FROM
                employees e
            LEFT JOIN
                techs t
            ON
                t.umn = e.umn
                LEFT JOIN
                    regulators r
                ON
                    r.umn = e.umn
            WHERE
                ( :occ = 'tech' AND t.umn IS NOT NULL )
                OR ( :occ = 'regulator' AND e.umn IS NOT NULL )
                OR ( :occ = '' ) 
            ORDER BY umn",
            compact( 'occ' )
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[ $row[ 'umn' ] ] = $row;
        }
        return $rows;
    }
    function employeeDelete( $umn ) {
        db(
            "DELETE FROM
                employees
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
    }
    function employeeUpdate( $umn, $ssn, $name, $phone, $addr, $salary ) {
        db(
            "UPDATE
                employees
            SET
                umn = :umn,
                ssn = :ssn,
                name = :name,
                phone = :phone,
                addr = :addr,
                salary = :salary
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' )
        );
    }
    function employeeItem( $umn ) {
        $res = db(
            "SELECT
                *
            FROM
                employees
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
        return mysql_fetch_array( $res );
    }
?>
