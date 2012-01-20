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
            $rows[ $row[ 'chkid' ] ] = $row;
        }
        return $rows;
    }
	function checktypeDelete( $chkid ) {
        db(
            "DELETE FROM
                checktypes
            WHERE
                chkid = :chkid
            LIMIT 1",
            compact( 'chkid' )
        );
    }
    function checktypeUpdate( $chkid, $name, $maxscore ) {
        db(
            "UPDATE
                checktypes
            SET
				name = :name,
                maxscore = :maxscore
            WHERE
                chkid = :chkid
            LIMIT 1",
            compact( 'chkid', 'name', 'maxscore' )
        );
    }
    function checktypeItem( $chkid ) {
        $res = db(
            "SELECT
                *
            FROM
                checktypes
            WHERE
                chkid = :chkid
            LIMIT 1",
            compact( 'chkid' )
        );
        return mysql_fetch_array( $res );
    }
?>
