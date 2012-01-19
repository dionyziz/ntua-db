<?php
    function employeeCreate( $ssn, $name, $phone, $addr, $salary, $errors ) {
                try{
                    db(
                        "INSERT INTO
                            employees
                        SET
                            ssn = :ssn,
                            name = :name,
                            phone = :phone,
                            addr = :addr,
                            salary = :salary",
                            compact( 'ssn', 'name', 'phone', 'addr', 'salary' )
                    );
                }
                catch ( DBException $e ) {
                    $errors[] = 'duplicatessn';
                    Redirect( 'employee/create?errors=' . implode( ',', $errors ) . '&name=' . $name . '&phone=' . $phone . '&addr=' . $addr . '&salary=' . $salary );
                }
    }

    function employeeListing() {
        $res = db(
            "SELECT
                *
            FROM
                employees"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
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
				ssn = :ssn,
                name = :name,
                phone = :phone,
                addr = :addr.
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
