<table>
    <thead>
        <tr>
            <th>Όνομα ελέγχου</th>
            <th>Μέγιστο σκορ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $types as $type ) {
                ?>
                <tr>

                    <td>
                        <?php
                        echo $type[ 'name' ];
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
