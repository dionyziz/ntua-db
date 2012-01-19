<table>
    <thead>
        <tr>
            <th>Όνομα ελέγχου</th>
            <th>Μέγιστο σκορ</th>
			<th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $checktypes as $checktype ) {
                ?>
                <tr>

                    <td>
                        <?php
                        echo htmlspecialchars( $checktype[ 'name' ] );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo htmlspecialchars( $checktype[ 'maxscore' ] );
                        ?>
                    </td>
					<td>
                        <a href='checktype/create?chkid=<?php
                        echo $checktype[ 'chkid' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία τύπου ελέγχου</a>
                        <form action='checktype/delete' method='post' class='delete'>
                            <input type='hidden' name='chkid' value='<?php
                            echo $checktype[ 'chkid' ];
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
