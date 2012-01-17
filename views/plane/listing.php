<table>
    <thead>
        <tr>
            <th>Εικονίδιο</th>
            <th>Κωδικός αεροσκάφους</th>
            <th>Όνομα τύπου</th>
            <th>Χωρητικότητα</th>
            <th>Βάρος</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $planes as $plane ) {
                $type = $types[ $plane[ 'tid' ] ]
                ?>
                <tr>
                    <td>
                        <?php
                        echo $type[ 'icon' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $plane[ 'pid' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $type[ 'name' ];
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
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
