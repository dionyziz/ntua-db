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
