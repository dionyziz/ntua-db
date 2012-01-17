<table>
    <thead>
        <tr>
            <th>Όνομα ελέγχου</th>
            <th>Μέγιστο σκορ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $checktypes as $checktype ) {
                ?>
                <tr>

                    <td>
                        <?php
                        echo $checktype[ 'name' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $checktype[ 'maxscore' ];
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
