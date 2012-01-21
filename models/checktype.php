<?php
    function checktypeCreate( $name, $maxscore ) {
        db(
            "INSERT INTO
                checktypes
            SET
                name = :name,
                maxscore = :maxscore",
            compact( 'name', 'maxscore' )
        );
    }
    function checktypeListing() {
        $res = db(
            "SELECT
                *
            FROM
                checktypes"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[ $row[ 'checktypeid' ] ] = $row;
        }
        return $rows;
    }
    function checktypeDelete( $checktypeid ) {
        db(
            "DELETE FROM
                checktypes
            WHERE
                checktypeid = :checktypeid
            LIMIT 1",
            compact( 'checktypeid' )
        );
    }
    function checktypeUpdate( $checktypeid, $name, $maxscore ) {
        db(
            "UPDATE
                checktypes
            SET
                name = :name,
                maxscore = :maxscore
            WHERE
                checktypeid = :checktypeid
            LIMIT 1",
            compact( 'checktypeid', 'name', 'maxscore' )
        );
    }
    function checktypeItem( $checktypeid ) {
        $res = db(
            "SELECT
                *
            FROM
                checktypes
            WHERE
                checktypeid = :checktypeid
            LIMIT 1",
            compact( 'checktypeid' )
        );
        return mysql_fetch_array( $res );
    }
?>
