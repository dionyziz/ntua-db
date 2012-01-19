<table>
    <thead>
        <tr>
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
            foreach ( $techs as $tech ) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo htmlspecialchars( $tech[ 'ssn' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $tech[ 'name' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $tech[ 'phone' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $tech[ 'addr' ] );
                        ?>
                    </td>
					<td>
                        <?php
                        echo $tech[ 'salary' ];
                        ?>
                    </td>
					<td>
                        <a href='tech/create?umn=<?php
                        echo $tech[ 'umn' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία εργαζομένου</a>
                        <form action='tech/delete' method='post' class='delete'>
                            <input type='hidden' name='umn' value='<?php
                            echo $tech[ 'umn' ];
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
