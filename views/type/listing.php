<table>
    <thead>
        <tr>
            <th>Εικονίδιο</th>
            <th>Όνομα τύπου</th>
            <th>Χωρητικότητα</th>
            <th>Βάρος</th>
            <th>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $types as $type ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo htmlspecialchars( $type[ 'icon' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $type[ 'name' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $type[ 'capacity' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $type[ 'weight' ];
                        ?>
                    </td>
                    <td>
                        <a href='type/create?tid=<?php
                        echo $type[ 'tid' ];
                        ?>'>Επεξεργασία τύπου</a>
                        <form action='type/delete' method='post'>
                            <input type='hidden' name='tid' value='<?php
                            echo $type[ 'tid' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή τύπου' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
