<p> <strong> Στατιστικά στοιχεία</strong></p>
<table border = "1">
    <tr>
    <th><strong>Επάγγελμα</strong></th>
    <th><strong>Ελάχιστος μισθός</strong></th>
    <th><strong>Μέσος μισθός</strong></th>
    <th><strong>Μέγιστος μισθός</strong></th>
    </tr>
    <tr>
        <?php
            foreach ( $employeeStatistic as $empStat ) {
            ?>
                <td><?php
                    if ( $empStat[ 'occ' ] == '' ) {
                        echo 'Μη ειδικευόμενοι';
                    }
                    else if ( $empStat[ 'occ' ] == 'tech' ) {
                        echo 'Τεχνικοί';
                    }
                    else {
                        echo 'Ελεγκτές Εναέριας Κυκλοφορίας';
                    }
                    ?></td>
                <td><?php
                        echo html( $empStat[ 'minimum' ] );
                    ?></td>
                <td><?php
                        echo html( round( $empStat[ 'average' ], 2 ) );
                    ?></td>
                <td><?php
                        echo html( $empStat[ 'maximum' ] );
                    ?></td>
    </tr>
            <?php
        }
    ?>
</table>
<div class='eof'></div>
