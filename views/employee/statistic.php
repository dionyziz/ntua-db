<table>
    <thead>
        <th>Τύπος εργαζομένου</th>
        <th>Ελάχιστος μισθός</th>
        <th>Μέγιστος μισθός</th>
        <th>Μέσος μισθός</th>
    </thead>
    <tbody>
        <?php
            foreach ( $type as $aggregate ) {
                ?><tr>
                    <td><?php
                    echo $aggregate[ 'minimum' ];
                    ?></td>
                    <td><?php
                    echo $aggregate[ 'maximum' ];
                    ?></td>
                    <td><?php
                    echo $aggregate[ 'average' ];
                    ?></td>
                </tr><?php
            }
        ?>
    </tbody>
</table>
