<?php
if ( empty( $umn ) ) {
    ?><h2>Νέος εργαζόμενος</h2><?php
}
else {
    ?><h2><?php
    echo htmlspecialchars( $name );
    ?></h2><?php
}
?>
<form action='employee/<?php
    if ( empty( $umn ) ) {
        ?>create<?php
    }
    else {
        ?>update<?php
    }
    ?>' method='post' enctype="multipart/form-data">
    <?php
    if ( !empty( $umn ) ) {
        ?><input type='hidden' name='umn' value='<?php
        echo $umn;
        ?>' /><?php
    }
    ?>
    <div>
        <label>Φωτογραφία:</label>
        <input type='file' name='photo' />
    </div>
    <div>
        <label>Όνομα και επώνυμο:</label> <input type='text' name='name' value='<?php
        echo htmlspecialchars( $name );
        ?>' <?php
        if ( isset( $errors[ 'noname' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
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
        <label>Απασχόληση:</label> <select name='occ' id='occ'
            <?php
            if ( isset( $errors[ 'noocc' ] ) ) {
                ?> class='error'<?php
            }
            ?>>
            <option selected value = "">Χωρίς ειδίκευση</option>
            <?php
            $occupations = array(
                'tech' => 'Τεχνικός',
                'reg' => 'Διαχειριστής'
            );
            foreach ( $occupations as $value => $caption ) {
                ?><option value="<?php
                echo $value;
                ?>"><?php
                echo $caption;
                ?></option><?php
            }
            ?></select>
    </div>
    <div id='reg_check'>
        <label>Τελευταίο check-up: </label>
        <input type='text' id='datechecked' <?php
        if ( isset( $errors[ 'nochecked' ] ) ) {
            ?> class='error'<?php
        }
        ?>
        value='<?php
        echo htmlspecialchars( $checked );
        ?>' name='checked' />
    </div>
    <div class='actions'>
        <?php
        if ( empty( $umn ) ) {
            ?><input type='submit' value='Δημιουργία' /><?php
        }
        else {
            ?><input type='submit' value='Ενημέρωση' /><?php
        }
        ?>
        <a href='employee/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
