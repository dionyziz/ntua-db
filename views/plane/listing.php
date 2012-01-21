<table>
    <thead>
        <tr>
            <th class='icon'>Εικονίδιο</th>
            <th>Κωδικός αεροσκάφους</th>
            <th>Όνομα τύπου</th>
            <th>Χωρητικότητα</th>
            <th>Βάρος</th>
            <th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $planes as $plane ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $plane[ 'icon' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $plane[ 'pid' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $plane[ 'name' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $plane[ 'capacity' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $plane[ 'weight' ];
                        ?>
                    </td>
                    <td>
                        <a href='plane/create?pid=<?php
                        echo $plane[ 'pid' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία αεροσκάφους</a>
                        <form action='plane/delete' method='post' class='delete'>
                            <input type='hidden' name='pid' value='<?php
                            echo $plane[ 'pid' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή αεροσκάφους' title='Διαγραφή' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<p class='create'><a href='plane/create'>Προσθήκη νέου αεροσκάφους</a></p>
