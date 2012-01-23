<?php
    function specializationCreate( $umn, $tid ) {
        db(
            "INSERT INTO
                specializations
            SET
                umn = :umn,
                tid = :tid",
            compact( 'umn', 'tid' )
        );
    }
    function specializationListing() {
        $res = db(
            "SELECT
                t.name AS tName, s.* , e.name AS eName
            FROM
                specializations s
            INNER JOIN
                planetypes t
            ON
                t.tid = s.tid
                INNER JOIN
                    employees e
                ON
                    s.umn = e.umn
            ORDER BY eName"
        );
        $rows = array();
        while ( $row = mysql_fetch_array( $res ) ) {
            $rows[ ] = $row;
        }
        return $rows;
    }
    function specializationDelete( $umn, $tid ) {
        db(
            "DELETE FROM
                specializations
            WHERE
                umn = :umn
                tid = :tid
            LIMIT 1",
            compact( 'umn', 'tid' )
        );
    }
    function specializationUpdate( $umn, $tid ) {
        //db(
        //    "UPDATE
        //        specializations
        //    SET
        //        tid = :tid
        //    WHERE
        //        umn = :umn
        //    LIMIT 1",
        //    compact( 'umn', 'tid' )
        //);
        //don't need to update specializations
        //right?
    }
    function specializationItem( $umn, $tid ) {
        $res = db(
            "SELECT
                s.* , e.name AS eName, t.name AS tName 
            FROM
                specializations s
            INNER JOIN
                planetypes t
            ON
                t.tid = s.tid
                INNER JOIN
                    employees e
                ON
                    s.umn = e.umn
                WHERE
                    s.tid = :tid
                    s.umn = :umn
            LIMIT 1",
            compact( 'umn', 'tid' )
        );
        return mysql_fetch_array( $res );
    }
?>
