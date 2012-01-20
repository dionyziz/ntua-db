<?php
if ( empty( $chkid ) ) {
    ?><h2>Δημιουργία νέου ελέγχου</h2><?php
}
else {
    ?><h2>Επεξεργασία ελέγχου <?php
    echo htmlspecialchars( $checktypes[ $chkid ][ 'name' ] );
    ?>, στο σκάφος <?php
    echo htmlspecialchars( $pid );
    ?>, από τον τεχνικό <?php
    echo htmlspecialchars( $umn );
    ?></h2><?php
}
?>
Πληκτρολογήστε τις πληροφορίες του ελέγχου:
<form action='check/<?php
    if ( empty( $chkid ) || empty( $pid ) || empty( $umn ) ) {
        ?>create<?php
    }
    else {
        $update=True;
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( $update ) {
        ?><input type='hidden' name='chkid' value='<?php
        echo $chkid;
        ?>' />
        <input type='hidden' name='pid' value='<?php
        echo $pid;
        ?>' />
        <input type='hidden' name='umn' value='<?php
        echo $umn;
        ?>' /><?php
    }
    ?>
    <div>
    <label>Όνομα Ελέγχου:</label> <select name='chkid'
        <?php
        if ( isset( $errors[ 'nochkid' ] ) ) {
            ?> class='error' <?php
        }
        if ( $update ) {
            ?> class='update' disabled='disabled'<?php
        }
        ?>>
        <?php
        foreach ( $checktypes as $checktype ) {
            ?><option value='<?php
            echo htmlspecialchars( $checktype[ 'chkid' ] );
            ?>'<?php
            if ( $chkid == $checktype[ 'chkid' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo htmlspecialchars( $checktype[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Κωδικός αεροσκάφους:</label> <select name='pid'
        <?php
        if ( isset( $errors[ 'nopid' ] ) ) {
            ?> class='error' <?php
        }
        if ( $update ) {
            ?> class='update' disabled='disabled'<?php
        }
        ?>>
        <?php
        foreach ( $planes as $plane ) {
            ?><option value='<?php
            echo htmlspecialchars( $plane[ 'pid' ] );
            ?>'<?php
            if ( $pid == $plane[ 'pid' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo htmlspecialchars( $plane[ 'pid' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Όνομα τεχνικού:</label> <input type='text' name='umn' value='<?php
        echo htmlspecialchars( $employees[ $umn ][ 'name' ] );
        ?>' <?php
        if ( isset( $errors[ 'noumn' ] ) ) {
            ?> class='error' <?php
        }
        if ( $update ) {
            ?> class='update' disabled='disabled'<?php
        }
        ?> />
    </div>
    <div>
        <label>Ημερομηνία διεξαγωγής:</label> <input type='text' name='created' value='<?php
        echo htmlspecialchars( $created );
        ?>' <?php
        if ( isset( $errors[ 'nocreated' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Χρόνος διεξαγωγής:</label> <input type='text' name='duration' value='<?php
        echo htmlspecialchars( $duration );
        ?>' <?php
        if ( isset( $errors[ 'noduration' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Σκορ:</label> <input type='text' name='score' value='<?php
        echo htmlspecialchars( $score );
        ?>' <?php
        if ( isset( $errors[ 'noscore' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <input type='submit' value='Αποθήκευση' />
</form>
