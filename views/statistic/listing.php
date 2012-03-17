<p><h1> <strong> Προεπισκόπηση</strong></h1> </p>
<p>
    <table border = "1">
        <caption> Μισθοί Εργαζομένων </caption>
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
</p>
<p>
    <table border = "1">
        <caption> Αριθμός Αεροσκαφών </caption>
        <tr>
        <th><strong>Όνομα μοντέλου</strong></th>
        <th><strong>Κωδικός μοντέλου</strong></th>
        <th><strong>Αριθμός Αεροσκαφών</strong></th>
        </tr>
        <tr>
            <?php
                foreach ( $planeStatistic as $planeStat ) {
                ?>
                    <td><?php
                        echo html( $planeStat[ 'name' ] );
                        ?></td>
                    <td><?php
                        echo html( $planeStat[ 'tid' ] );
                    ?></td>
                    <td><?php
                        echo html( $planeStat[ 'planeCount' ] );
                        $sum = $sum + $planeStat[ 'planeCount' ];
                    ?></td>
        </tr>
                <?php
            }
        ?>
        <tr>
            <td>Σύνολο</td>
            <td> --- </td>
            <td> <?php echo $sum; ?> </td>
    </table>
</p>
<p>
    <table border = "1">
        <caption> Αεροσκάφη προς επισκευή </caption>
        <tr>
        <th><strong>Κωδικός αεροσκάφος</strong></th>
        <th><strong>Όνομα μοντέλου</strong></th>
        <th><strong>Συνολική Επίδοση Ελέγχων</strong></th>
        <th><strong>Ποσοστό</strong></strong></th>
        </tr>
        <tr>
            <?php
                foreach ( $checkStatistic as $checkStat ) {
                ?>
                    <td><?php
                        echo html( $checkStat[ 'pid' ] );
                        ?></td>
                    <td><?php
                        echo html( $checkStat[ 'name' ] );
                    ?></td>
                    <td><?php
                        echo html( $checkStat[ 'checkScore' ] ) . '/' . html( $checkStat[ 'maxScore' ] ) ;
                    ?></td>
                    <td><?php
                        echo round( $checkStat[ 'checkScore' ] / $checkStat[ 'maxScore' ], 2 ) . '%' ;
                    ?></td>
        </tr>
                <?php
            }
        ?>
    </table>
</p>
<div class='eof'></div>
