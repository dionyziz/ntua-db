<?php
if ( empty( $checktypeid ) ) {
    ?><h2>Δημιουργία νέου τύπου ελέγχου</h2><?php
}
else {
    ?><h2>Επεξεργασία τύπου ελέγχου <?php
    echo htmlspecialchars( $name );
    ?></h2><?php
}
?>
<form action='checktype/<?php
    if ( empty( $checktypeid ) ) {
        ?>create<?php
    }
    else {
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( !empty( $checktypeid ) ) {
        ?><input type='hidden' name='checktypeid' value='<?php
        echo $checktypeid;
        ?>' /><?php
    }
    ?>
    <div>
        <label>Όνομα Ελέγχου:</label> <input type='text' name='name' value='<?php
        echo htmlspecialchars( $name );
        ?>' <?php
        if ( isset( $errors[ 'noname' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Μέγιστο Σκορ:</label> <input type='text' name='maxscore' value='<?php
        echo htmlspecialchars( $maxscore );
        ?>' <?php
        if ( isset( $errors[ 'nomaxscore' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div class='actions'>
        <?php
        if ( empty( $checktypeid ) ) {
            ?><input type='submit' value='Δημιουργία' /><?php
        }
        else {
            ?><input type='submit' value='Ενημέρωση' /><?php
        }
        ?>
        <a href='checktype/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
