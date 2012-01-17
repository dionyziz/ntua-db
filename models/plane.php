<?php
    function planeCreate( $pid, $tid ) {
        db(
            "INSERT INTO
                planes 
            SET
                pid = :pid,
                tid = :tid",
            compact( 'pid', 'tid' )
        );
    }
    function planeListing() {
        $res = db(
            "SELECT
                *
            FROM
                planes"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        return $rows;
    }
?>
