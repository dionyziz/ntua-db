Πληκτρολογήστε τις πληροφορίες του νέου εργαζομένου:
<form action='aviation/employee/create' method='post'>
    <div>
        <label>Αριθμός κοινωνικής ασφάλισης (SSN):</label> <input type='text' name='ssn' value='<?php
        echo htmlspecialchars( $ssn );
        ?>' <?php
        if ( isset( $errors[ 'nossn' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
	<div>
        <label>Όνομα:</label> <input type='text' name='name' value='<?php
        echo htmlspecialchars( $name );
        ?>' <?php
        if ( isset( $errors[ 'noname' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Τηλέφωνο:</label> <input type='text' name='phone' value='<?php
        echo htmlspecialchars( $phone );
        ?>' <?php
        if ( isset( $errors[ 'nophone' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Διεύθυνση:</label> <input type='text' name='addr' value='<?php
        echo htmlspecialchars( $addr );
        ?>' <?php
        if ( isset( $errors[ 'noaddr' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
	<div>
        <label>Μισθός:</label> <input type='text' name='salary' value='<?php
        echo htmlspecialchars( $salary );
        ?>' <?php
        if ( isset( $errors[ 'nosalary' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <input type='submit' value='Δημιουργία νέου εργαζομένου' />
</form>
