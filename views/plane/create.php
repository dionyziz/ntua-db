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
        <label>Κωδικός τύπου:</label> <input type='text' name='tid' value='<?php
        echo htmlspecialchars( $ );
        ?>' <?php
        if ( isset( $errors[ 'notid' ] ) ) {
            ?> class='error' <?php
        }
        ?> />
    </div>
    <input type='submit' value='Δημιουργία νέου αεροσκάφους' />
</form>
