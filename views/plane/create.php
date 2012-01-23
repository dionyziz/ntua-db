<?php
if ( empty( $pid ) ) {
    ?><h2>Εισαγωγή νέου αεροσκάφους</h2><?php
}
else {
    ?><h2>Επεξεργασία αεροσκάφους <?php
    echo htmlspecialchars( $pid );
    ?></h2><?php
}
?>
<form action='plane/<?php
    if ( empty( $pid ) ) {
        ?>create<?php
    }
    else {
        $update = True;
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( !empty( $pid ) ) {
        ?><input type='hidden' name='pid' value='<?php
        echo $pid;
        ?>' /><?php
    }
    ?>
    <div>
        <label>Κωδικός αεροσκάφους:</label> <input type='text' name='pid' value='<?php
        echo htmlspecialchars( $pid );
        ?>' <?php
        if ( isset( $errors[ 'nopid' ] ) ) {
            ?> class='error' <?php
        }
        if ( $update ) {
            ?> class='update' disabled='disabled'<?
        }
        ?> />
    </div>
    <div>
    <label>Όνομα τύπου:</label> <select name='tid'
        <?php
        if ( isset( $errors[ 'notid' ] ) ) {
            ?> class='error'<?php
        }
        ?>>
        <?php
        foreach ( $planetypes as $planetype ) {
            ?><option value='<?php
            echo htmlspecialchars( $planetype[ 'tid' ] );
            ?>'<?php
            if ( $tid == $planetype[ 'tid' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo htmlspecialchars( $planetype[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div class='actions'>
        <?php
        if ( empty( $pid ) ) {
            ?><input type='submit' value='Δημιουργία' /><?php
        }
        else {
            ?><input type='submit' value='Ενημέρωση' /><?php
        }
        ?>
        <a href='plane/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
