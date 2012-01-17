<table>
    <thead>
        <tr>
            <th>Κωδικός αεροσκάφους</th>
            <th>Όνομα τύπου</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $planes as $type ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $type[ 'pid' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $type[ 'tid' ];
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
