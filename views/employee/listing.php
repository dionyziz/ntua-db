<table>
    <thead>
        <tr>
            <th>Αριθμός κοινωνικής ασφάλισης</th>
            <th>Όνομα εργαζομένου</th>
            <th>Τηλέφωνο</th>
            <th>Δίέυθυνση</th>
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
                        echo $employee[ 'ssn' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $employee[ 'name' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $employee[ 'phone' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $employee[ 'addr' ];
                        ?>
                    </td>
					<td>
                        <?php
                        echo $employee[ 'salary' ];
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
