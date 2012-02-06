<?php
if ( empty( $umn ) ) {
    ?><h2>Εισαγωγή νέας ειδίκευσης</h2><?php
}
else {
    ?><h2>Επεξεργασία αεροσκάφους <?php
    echo html( $umn );
    ?></h2><?php
}
?>
<form action='specialization/<?php
    if ( empty( $umn ) ) {
        ?>create<?php
    }
    else {
        $update = True;
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
    <label>Όνομα τεχνικού:</label> <select name='umn'
        <?php
        if ( isset( $errors[ 'noumn' ] ) ) {
            ?> class='error'<?php
        }
        ?>>
        <?php
        foreach ( $techs as $tech ) {
            ?><option value='<?php
            echo html( $tech[ 'umn' ] );
            ?>'<?php
            if ( $umn == $tech[ 'umn' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo html( $tech[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
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
            echo html( $planetype[ 'tid' ] );
            ?>'<?php
            if ( $tid == $planetype[ 'tid' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo html( $planetype[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
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
        <a href='specialization/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
