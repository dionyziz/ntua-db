Πληκτρολογήστε τις πληροφορίες του νέου τύπου ελέγχου:
<form action='checktype/create' method='post'>
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
    <input type='submit' value='Δημιουργία νέου τύπου ελέγχου' />
</form>
