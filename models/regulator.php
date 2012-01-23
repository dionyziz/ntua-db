<?php
    function regulatorCreate( $umn, $checked ) {
        db(
            "INSERT INTO
                regulators
            SET
                umn = :umn
                checked = :checked",
            compact( 'umn' )
        );
    }
    function createView( $umn, $ssn, $name, $phone, $addr, $salary ) {
        $reg = employeeItem( $umn );
        if ( $reg === false ) {
            throw new Exception( 'The employee you are trying to edit does not exist' ); }
        if ( empty( $ssn ) ) {
            $ssn = $reg[ 'ssn' ];
        }
        if ( empty( $name ) ) {
            $name = $reg[ 'name' ];
        }
        if ( empty( $phone ) ) {
            $phone = $reg[ 'phone' ];
        }
        if ( empty( $addr ) ) {
            $addr = $reg[ 'addr' ];
        }
        if ( empty( $salary ) ) {
            $salary = $reg[ 'salary' ];
        }
        $errors = array_flip( explode( ',', $errors ) );
        view( 'regulator/create', compact( 'errors', 'umn', 'ssn', 'name', 'phone', 'addr', 'salary' ) );
    }

    function regulatorListing() {
        return employeeListing( 'regulator' );
    }
    function regulatorDelete( $umn ) {
        db(
            "DELETE FROM
                regulators
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
    }
    function regulatorItem( $umn ) {
        $res = db(
            "SELECT
                *
            FROM
                regulators
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
        return mysql_fetch_array( $res );
    }
?>
