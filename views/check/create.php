<?php
if ( empty( $checktypeid ) ) {
    ?><h2>Δημιουργία νέου ελέγχου</h2><?php
}
else {
    ?><h2>Επεξεργασία ελέγχου <?php
    echo htmlspecialchars( $checktypes[ $checktypeid ][ 'name' ] );
    ?>, στο σκάφος <?php
    echo htmlspecialchars( $pid );
    ?>, από τον τεχνικό <?php
    echo htmlspecialchars( $employees[ $umn ][ 'name' ] );
    ?></h2><?php
}
?>
<form action='check/<?php
    if ( empty( $checktypeid ) || empty( $pid ) || empty( $umn ) ) {
        ?>create<?php
    }
    else {
        $update=True;
        ?>update<?php
    }
    ?>' method='post'>
    <?php
    if ( $update ) {
        ?><input type='hidden' name='checktypeid' value='<?php
        echo $checktypeid;
        ?>' />
        <input type='hidden' name='pid' value='<?php
        echo $pid;
        ?>' />
        <input type='hidden' name='umn' value='<?php
        echo $umn;
        ?>' /><?php
    }
    ?>
    <div>
    <label>Όνομα Ελέγχου:</label> <select name='checktypeid'
        <?php
        $classes = array();
        if ( isset( $errors[ 'nochecktypeid' ] ) ) {
            $classes[] = 'error';
        }
        if ( $update ) {
            $classes[] = 'update';
            ?> disabled='disabled'<?php
        }
        ?>class='<?php
        echo implode( ' ', $classes );
        ?>'>
        <?php
        foreach ( $checktypes as $checktype ) {
            ?><option value='<?php
            echo htmlspecialchars( $checktype[ 'checktypeid' ] );
            ?>'<?php
            if ( $checktypeid == $checktype[ 'checktypeid' ] ) {
                echo ' SELECTED';
            }
            ?>><?php
            echo htmlspecialchars( $checktype[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Κωδικός αεροσκάφους:</label> <select name='pid'
        <?php
        if ( isset( $errors[ 'nopid' ] ) ) {
            ?> class='error' <?php
        }
        if ( $update ) {
            ?> class='update' disabled='disabled'<?php
        }
        ?>>
        <?php
        foreach ( $planes as $plane ) {
            ?><option value='<?php
            echo htmlspecialchars( $plane[ 'pid' ] );
            ?>'<?php
            if ( $pid == $plane[ 'pid' ] ) {
                ?> selected='selected'<?php
            }
            ?>><?php
            echo htmlspecialchars( $plane[ 'pid' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Τεχνικός:</label> <select name='umn' <?php
        $classes = array();
        if ( isset( $errors[ 'noumn' ] ) ) {
            $classes[] = 'error';
        }
        if ( $update ) {
            $classes[] = 'update';
            ?> disabled='disabled'<?php
        }
        ?> class="<?php
        echo implode( ' ', $classes );
        ?>"><?php
        foreach ( $techs as $tech ) {
            ?><option value='<?php
            echo $tech[ 'umn' ];
            ?>'><?php
            echo htmlspecialchars( $tech[ 'name' ] );
            ?></option><?php
        }
        ?>
        </select>
    </div>
    <div>
        <label>Ημερομηνία διεξαγωγής:</label> <input type='text' id='datecheckcreated' name='created' value='<?php
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
    <div class='actions'>
        <?php
        if ( empty( $checktypeid ) ) {
            ?><input type='submit' value='Δημιουργία' /><?php
        }
        else {
            ?><input type='submit' value='Ενημέρωση' /><?php
        }
        ?>
        <a href='check/listing' class='cancel'>Άκυρο</a>
        <div class='eof'></div>
    </div>
</form>
