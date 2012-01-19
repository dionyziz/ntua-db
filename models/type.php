<?php
    function typeCreate( $name, $weight, $capacity ) {
        db(
            "INSERT INTO
                types
            SET
                name = :name,
                weight = :weight,
                capacity = :capacity",
            compact( 'name', 'weight', 'capacity' )
        );
    }
    function typeListing() {
        $res = db(
            "SELECT
                *
            FROM
                types"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[ $row[ 'tid' ] ] = $row;
        }
        return $rows;
    }
    function typeDelete( $tid ) {
        db(
            "DELETE FROM
                types
            WHERE
                tid = :tid
            LIMIT 1",
            compact( 'tid' )
        );
    }
    function typeUpdate( $tid, $name, $weight, $capacity ) {
        db(
            "UPDATE
                types
            SET
                name = :name,
                weight = :weight,
                capacity = :capacity
            WHERE
                tid = :tid
            LIMIT 1",
            compact( 'tid', 'name', 'weight', 'capacity' )
        );
    }
    function typeItem( $tid ) {
        $res = db(
            "SELECT
                *
            FROM
                types
            WHERE
                tid = :tid
            LIMIT 1",
            compact( 'tid' )
        );
        return mysql_fetch_array( $res );
    }
?>
