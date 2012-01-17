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
            $rows[$row[0]] = array_slice($row,1);
        }
        return $rows;
    }
?>
