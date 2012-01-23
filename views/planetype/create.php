<?php
if ( empty( $tid ) ) {
    ?><h2>Δημιουργία νέου τύπου αεροσκάφους</h2><?php
}
else {
    ?><h2>Επεξεργασία τύπου αεροσκάφους <?php
    echo htmlspecialchars( $name );
    ?></h2><?php
}
?>
<form action='planetype/<?php
    if ( empty( $tid ) ) {
        ?>create<?php
    }
    else {
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( !empty( $tid ) ) {
        ?><input type='hidden' name='tid' value='<?php
        echo $tid;
        ?>' /><?php
    }
    ?>
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
        <label>Χωρητικότητα:</label> <input type='text' name='capacity' value='<?php
        echo htmlspecialchars( $capacity );
        ?>' <?php
        if ( isset( $errors[ 'nocapacity' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Βάρος:</label> <input type='text' name='weight' value='<?php
        echo htmlspecialchars( $weight );
        ?>' <?php
        if ( isset( $errors[ 'noweight' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
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
        <a href='planetypes/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
