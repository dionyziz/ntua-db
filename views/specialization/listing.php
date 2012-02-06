<table>
    <thead>
        <tr>
            <th class='icon'>Εικονίδιο</th>
            <th>Όνομα τύπου</th>
            <th>Όνομα τεχνικού</th>
            <th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $specializations as $specialization ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $specialization[ 'icon' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $specialization[ 'tName' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $specialization[ 'eName' ];
                        ?>
                    </td>
                    <td>
                        <form action='specialization/delete' method='post' class='delete' onclick="return confirm('Είστε σίγουρος ότι θέλετε να πραγματοποιήσετε τη διαγραφή; (Η ενέργεια αυτή δεν αντιστρέφεται)')">
                            <input type='hidden' name='umn' value='<?php
                            echo $specialization[ 'umn' ];
                            ?> ' />
                            <input type='hidden' name='tid' value='<?php
                            echo $specialization[ 'tid' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή ειδίκευσης' title='Διαγραφή' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<p class='create'><a href='specialization/create'>Προσθήκη νέας ειδίκευσης</a></p>
