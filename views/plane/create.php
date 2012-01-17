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
    <label>Κωδικός τύπου:</label> <select name='tid'
        <?php
        if ( isset( $errors[ 'notid' ] ) ) {
            ?> class='error' <?php
        }
        ?> >
        <?php
        $types = typeListing();
        foreach ( $types as $type) {
            echo '<option>'.type.'</option>';
        }

        ?>


    </div>
    <input type='submit' value='Δημιουργία νέου αεροσκάφους' />
</form>
