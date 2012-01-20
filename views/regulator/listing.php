<table>
    <thead>
        <tr>
            <th>ΑΦΜ</th>
            <th>Όνομα εργαζομένου</th>
            <th>Τηλέφωνο</th>
            <th>Διεύθυνση</th>
			<th>Μισθός</th>
			<th>Τελευταίος Έλεγχος</th>
			<th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $regulators as $regulator ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo htmlspecialchars( $regulator[ 'ssn' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $regulator[ 'name' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $regulator[ 'phone' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $regulator[ 'addr' ] );
                        ?>
                    </td>
					<td>
                        <?php
                        echo $regulator[ 'salary' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $regulator[ 'checked' ];
                        ?>
					<td>
                        <a href='regulator/create?umn=<?php
                        echo $regulator[ 'umn' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία εργαζομένου</a>
                        <form action='regulator/delete' method='post' class='delete'>
                            <input type='hidden' name='umn' value='<?php
                            echo $regulator[ 'umn' ];
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
