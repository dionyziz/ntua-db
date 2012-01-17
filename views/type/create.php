Πληκτρολογήστε τις πληροφορίες του νέου τύπου αεροσκάφους:
<form action='type/create' method='post'>
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
    <input type='submit' value='Δημιουργία νέου τύπου αεροσκάφους' />
</form>
