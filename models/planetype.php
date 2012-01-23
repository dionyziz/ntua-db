<?php
    function planetypeCreate( $name, $weight, $capacity ) {
        db(
            "INSERT INTO
                planetypes
            SET
                name = :name,
                weight = :weight,
                capacity = :capacity",
            compact( 'name', 'weight', 'capacity' )
        );
    }
    function planetypeListing() {
        $res = db(
            "SELECT
                *
            FROM
                planetypes"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[ $row[ 'tid' ] ] = $row;
        }
        return $rows;
    }
    function planetypeDelete( $tid ) {
        db(
            "DELETE FROM
                planetypes
            WHERE
                tid = :tid
            LIMIT 1",
            compact( 'tid' )
        );
    }
    function planetypeUpdate( $tid, $name, $weight, $capacity ) {
        db(
            "UPDATE
                planetypes
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
    function planetypeItem( $tid ) {
        $res = db(
            "SELECT
                *
            FROM
                planetypes
            WHERE
                tid = :tid
            LIMIT 1",
            compact( 'tid' )
        );
        return mysql_fetch_array( $res );
    }
?>
