<table>
    <thead>
        <tr>
            <th class='icon'>Εικονίδιο</th>
            <th>Όνομα τύπου</th>
            <th>Χωρητικότητα</th>
            <th>Βάρος</th>
            <th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $types as $type ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo html( $type[ 'icon' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo html( $type[ 'name' ] );
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
                        <a href='planetype/create?tid=<?php
                        echo $type[ 'tid' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία τύπου</a>
                        <form action='planetype/delete' method='post' class='delete' onclick="return confirm('Είστε σίγουρος ότι θέλετε να πραγματοποιήσετε τη διαγραφή; (Η ενέργεια αυτή δεν αντιστρέφεται)')">
                            <input type='hidden' name='tid' value='<?php
                            echo $type[ 'tid' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή τύπου' title='Διαγραφή' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<p class='create'><a href='planetype/create'>Προσθήκη νέου τύπου αεροσκάφους</a></p>
