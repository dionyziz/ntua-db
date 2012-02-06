<p>
<!--- This doesnt work, can't figure why, relates to js/behaviour.js
<div>
    <label>Όνομα εργαζομένου:</label>
    <input name='filter' id='search_filter' type='text' label='Όνομα εργαζομένου'>
    </input>
</div>
--->
<div>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
        <label>Να εμφανίζονται:</label>
        <select name='occupation' onchange="window.location.href = 'employee/listing?occ='+this.options [this.options.selectedIndex].value">
            <option <?php if ( empty( $occ ) ) {
                ?> selected <?php
                }
                ?> value=''>Όλοι οι εργαζόμενοι</option>
            <option <?php if ( $occ == 'tech' ) {
                ?> selected <?php
                }
                ?> value='tech'>Τεχνικοί</option>
            <option <?php if ( $occ == 'regulator' ) {
                ?> selected <?php
                }
                ?> value='regulator'>Ρυθμιστές εναέριας κυκλοφορίας</option>
        </select>
    </form>
</div>
</p>
<div>
    <ul class='person'>
        <?php
            foreach ( $employees as $employee ) {
                ?>
                <li>
                    <?php
                    if ( isset( $employee[ 'imageurl' ] ) ) {
                        ?><img src='<?php
                        echo $employee[ 'imageurl' ];
                        ?>' alt='<?php
                        echo html( $employee[ 'name' ] );
                        ?>' /><?php
                    }
                    ?>
                    <form action='employee/delete' method='post' class='delete' onclick="return confirm('Είστε σίγουρος ότι θέλετε να πραγματοποιήσετε τη διαγραφή; (Η ενέργεια αυτή δεν αντιστρέφεται)')">
                        <input type='hidden' name='umn' value='<?php
                        echo $employee[ 'umn' ];
                        ?> ' />
                        <input type='submit' value='&times;' title='Διαγραφή'/>
                    </form>
                    <h3>
                        <a href='employee/create?umn=<?php
                            echo $employee[ 'umn' ];
                            ?>'><?php
                            echo html( $employee[ 'name' ] );
                        ?></a>
                    </h3>
                    <div>
                        <strong>Τηλέφωνο</strong>
                        <span><?php
                            echo html( $employee[ 'phone' ] );
                        ?></span>
                    </div>
                    <div>
                        <strong>Διεύθυνση</strong>
                        <span><?php
                            echo html( $employee[ 'addr' ] );
                        ?></span>
                    </div>
                    <div>
                        <strong>Μισθός</strong>
                        <span><?php
                            echo $employee[ 'salary' ];
                        ?></span>
                    </div>
                </li>
                <?php
            }
        ?>
        <li class='create'><a href='employee/create'>Προσθήκη νέου εργαζομένου</a></li>
    </ul>
</div>
<div class='eof'></div>
