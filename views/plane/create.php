Πληκτρολογήστε τις πληροφορίες του νέου αεροσκάφους:
<form action='plane/create' method='post'>
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
    <label>Όνομα τύπου:</label> <select name='tid'
        <?php
        if ( isset( $errors[ 'notid' ] ) ) {
            ?> class='error'<?php
        }
        ?>>
        <?php
        foreach ( $types as $type ) {
            ?><option value='<?php
            echo $type[ 'tid' ];
            ?>'><?php
            echo htmlspecialchars( $type[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <input type='submit' value='Δημιουργία νέου αεροσκάφους' />
</form>
