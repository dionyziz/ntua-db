<table>
    <thead>
        <tr>
            <th>Όνομα Ελέγχου</th>
            <th>Κωδικός αεροσκάφους</th>
            <th>Κωδικός τεχνικού</th>
            <th>Ημερομηνία διεξαγωγής</th>
            <th>Σκορ</th>
            <th>Μέγιστο σκορ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $checks as $check ) {
                $type = $types[ $checks[ 'chkid' ] ];
                ?>
                <tr>

                    <td>
                        <?php
                        echo $type[ 'name' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'pid' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'umn' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'created' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'score' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $type[ 'maxscore' ];
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
