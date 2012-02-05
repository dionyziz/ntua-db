<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<select name='occupation' onchange="if(this.options.selectedIndex>0) window.location.href = 'employee/listing?occ='+this.options [this.options.selectedIndex].value">
  <option value=''>Να εμφανίζονται οι:</option>
  <option value='tech'>Τεχνικοί</option>
  <option value='regulator'>Ρυθμιστές εναέριας κυκλοφορίας</option>
  <option value=''>Όλοι</option>
  </select>
</form>
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
                    echo htmlspecialchars( $employee[ 'name' ] );
                    ?>' /><?php
                }
                ?>
                <form action='employee/delete' method='post' class='delete'>
                    <input type='hidden' name='umn' value='<?php
                    echo $employee[ 'umn' ];
                    ?> ' />
                    <input type='submit' value='&times;' title='Διαγραφή'/>
                </form>
                <h3>
                    <a href='employee/create?umn=<?php
                        echo $employee[ 'umn' ];
                        ?>'><?php
                        echo htmlspecialchars( $employee[ 'name' ] );
                    ?></a>
                </h3>
                <div>
                    <strong>Τηλέφωνο</strong>
                    <span><?php
                        echo htmlspecialchars( $employee[ 'phone' ] );
                    ?></span>
                </div>
                <div>
                    <strong>Διεύθυνση</strong>
                    <span><?php
                        echo htmlspecialchars( $employee[ 'addr' ] );
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
<div class='eof'></div>
