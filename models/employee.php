<?php
    function employeeCreate( $ssn, $name, $phone, $addr, $salary ) {
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
?>
