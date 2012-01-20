<?php
    function techCreate( $umn ) {
        db(
            "INSERT INTO
                techs
            SET
                umn = :umn",
            compact( 'umn' )
        );
    }
    function techListing() {
        return employeeListing( 'tech' );
    }
    function techDelete( $umn ) {
        db(
            "DELETE FROM
                techs
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
    }
    function techItem( $umn ) {
        $res = db(
            "SELECT
                *
            FROM
                techs
            WHERE
                umn = :umn
            LIMIT 1",
            compact( 'umn' )
        );
        return mysql_fetch_array( $res );
    }
?>
