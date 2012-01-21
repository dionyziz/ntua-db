<table>
    <thead>
        <tr>
            <th>UMN</th>
            <th>ΑΦΜ</th>
            <th>Όνομα εργαζομένου</th>
            <th>Τηλέφωνο</th>
            <th>Διεύθυνση</th>
            <th>Μισθός</th>
            <th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $employees as $employee ) {
        ?>
        <tr>
            <td>
                <?php
                    echo htmlspecialchars( $employee[ 'umn' ] );
                ?>
            </td>
            <td>
                <?php
                    echo htmlspecialchars( $employee[ 'ssn' ] );
                ?>
            </td>
            <td>
                <?php
                    echo htmlspecialchars( $employee[ 'name' ] );
                ?>
            </td>
            <td>
                <?php
                echo htmlspecialchars( $employee[ 'phone' ] );
                ?>
            </td>
            <td>
                <?php
                echo htmlspecialchars( $employee[ 'addr' ] );
                ?>
            </td>
            <td>
                <?php
                echo $employee[ 'salary' ];
                ?>
            </td>
            <td>
                <a href='employee/create?umn=<?php
                echo $employee[ 'umn' ];
                ?>' class='update' title='Επεξεργασία'>Επεξεργασία εργαζομένου</a>
                <form action='employee/delete' method='post' class='delete'>
                    <input type='hidden' name='umn' value='<?php
                    echo $employee[ 'umn' ];
                    ?> ' />
                    <input type='submit' value='Διαγραφή εργαζομένου' title='Διαγραφή'/>
                </form>
            </td>
        </tr>
        <?php
        }
    ?>
</tbody>
</table>
<p class='create'><a href='employee/create'>Προσθήκη νέου εργαζομένου</a></p>
