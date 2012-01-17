Πληκτρολογήστε τις πληροφορίες του νέου ελέγχου:
<form action='check/create' method='post'>
    <div>
    <label>Όνομα Ελέγχου:</label> <select name='chkid'
        <?php
        if ( isset( $errors[ 'nochkid' ] ) ) {
            ?> class='error' <?php
        }
        ?>>
        <?php
        foreach ( $checktypes as $checktype ) {
            ?><option value='<?php
            echo $checktype[ 'tid' ];
            ?>'<?php
            echo htmlspecialchars( $checktype[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Κωδικός αεροσκάφους:</label> <input type='text' name='pid' value='<?php
        echo htmlspecialchars( $pid );
        ?>' <?php
        if ( isset( $errors[ 'nopid' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <div>
        <label>Κωδικός τεχνικού:</label> <input type='text' name='umn' value='<?php
        echo htmlspecialchars( $umn );
        ?>' <?php
        if ( isset( $errors[ 'noumn' ] ) ) {
            ?> class='error' <?php
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
    <input type='submit' value='Δημιουργία νέου ελέγχου' />
</form>
