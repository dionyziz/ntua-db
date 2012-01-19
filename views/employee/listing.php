<table>
    <thead>
        <tr>
            <th>ΑΦΜ</th>
            <th>Όνομα εργαζομένου</th>
            <th>Τηλέφωνο</th>
            <th>Διεύθυνση</th>
			<th>Μισθός</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $employees as $employee ) {
                ?>
                <tr>
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
                        echo $employee[ 'phone' ];
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
                        ?>'>Επεξεργασία τύπου</a>
                        <form action='employee/delete' method='post'>
                            <input type='hidden' name='umn' value='<?php
                            echo $employee[ 'umn' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή εργαζομένου' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
