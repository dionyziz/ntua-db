<table>
    <thead>
        <tr>
            <th>Όνομα Ελέγχου</th>
            <th>Κωδικός αεροσκάφους</th>
            <th>Κωδικός τεχνικού</th>
            <th>Ημερομηνία διεξαγωγής</th>
            <th>Σκορ</th>
            <th>Μέγιστο σκορ</th>
            <th class='update'>Ενημέρωση</th>
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
                    <td>
                        <a href='check/create?chkid=<?php
                        echo $check[ 'chkid' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία ελέγχου</a>
                        <form action='check/delete' method='post' class='delete'>
                            <input type='hidden' name='chkid' value='<?php
                            echo $check[ 'chkid' ];
                            ?> ' />
                            <input type='hidden' name='pid' value='<?php
                            echo $check[ 'pid' ];
                            ?> ' />
                            <input type='hidden' name='umn' value='<?php
                            echo $check[ 'umn' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή ελέγχου' title='Διαγραφή' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
