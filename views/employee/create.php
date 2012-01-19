<?php
if ( empty( $umn ) ) {
    ?><h2>Δημιουργία νέου εργαζομένου</h2><?php
}
else {
    ?><h2>Επεξεργασία εργαζομένου <?php
    echo htmlspecialchars( $name );
    ?></h2><?php
}
?>
Πληκτρολογήστε τις πληροφορίες του νέου εργαζομένου:
<form action='employee/<?php
    if ( empty( $umn ) ) {
        ?>create<?php
    }
    else {
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( !empty( $umn ) ) {
        ?><input type='hidden' name='umn' value='<?php
        echo $umn;
        ?>' /><?php
    }
    ?>
	<div>
        <label>UMN:</label> <input type='text' name='umn' value='<?php
        echo htmlspecialchars( $umn );
        ?>' <?php
        if ( isset( $errors[ 'noumn' ] ) ) {
            ?> class='error' <?php
        }
        if ( isset( $errors[ 'duplicateumn' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>ΑΦΜ:</label> <input type='text' name='ssn' value='<?php
        echo htmlspecialchars( $ssn );
        ?>' <?php
        if ( isset( $errors[ 'nossn' ] ) ) {
            ?> class='error' <?php
        }
        if ( isset( $errors[ 'duplicatessn' ] ) ) {
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
	<div>
		<label>Απασχόληση:</label> <select name=''
	        <?php
	        if ( isset( $errors[ 'notid' ] ) ) {
	            ?> class='error'<?php
	        }
	        ?>>
	        <?php
			$occup = array ( 'Technician','Regulator', 'Other' );
	        foreach ( $occup as $occups => $value ) {
				echo '<option value="'.$value.'">'.$value.'</option>';
	        }
	        echo '</select>';
			?>
			
	</div>
    <input type='submit' value='Αποθήκευση' />
</form>
