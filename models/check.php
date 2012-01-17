<?php
    function checkCreate( $chkid, $pid, $umn, $created, $duration, $score) {
        db(
            "INSERT INTO
                checks
            SET
                chkid = :chkid,
                pid = :pid,
                umn = :umn,
                created = :created,
                duration = :duration,
                score = :score",
            compact( 'chkid', 'pid', 'umn', 'created', 'duration', 'score')
        );
    }
    function checkListing() {
        $res = db(
            "SELECT
                *
            FROM
                checks"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[] = $row;
        }
        return $rows;
    }
?>
