<?php
if ( empty( $chkid ) ) {
    ?><h2>Δημιουργία νέου τύπου ελέγχου</h2><?php
}
else {
    ?><h2>Επεξεργασία τύπου ελέγχου <?php
    echo htmlspecialchars( $name );
    ?></h2><?php
}
?>
Πληκτρολογήστε τις πληροφορίες του νέου τύπου ελέγχου:
<form action='checktype/<?php
    if ( empty( $chkid ) ) {
        ?>create<?php
    }
    else {
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( !empty( $chkid ) ) {
        ?><input type='hidden' name='chkid' value='<?php
        echo $chkid;
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
    <input type='submit' value='Αποθήκευση' />
</form>
