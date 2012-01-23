<table>
    <thead>
        <tr>
            <th>Όνομα Ελέγχου</th>
            <th>Κωδικός αεροσκάφους</th>
            <th>Όνομα τεχνικού</th>
            <th>Ημερομηνία διεξαγωγής</th>
            <th>Σκορ</th>
            <th>Μέγιστο σκορ</th>
            <th class='update'>Ενημέρωση</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ( $checks as $check ) {
                ?>
                <tr>

                    <td>
                        <?php
                        echo $check[ 'checkTypeName' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'pid' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'techName' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'created' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'score' ];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $check[ 'maxscore' ];
                        ?>
                    </td>
                    <td>
                        <a href='check/create?checktypeid=<?php
                        echo $check[ 'checktypeid' ];
                        ?>&amp;pid=<?php
                        echo $check[ 'pid' ];
                        ?>&amp;umn=<?php
                        echo $check[ 'umn' ];
                        ?>' class='update' title='Επεξεργασία'>Επεξεργασία ελέγχου</a>
                        <form action='check/delete' method='post' class='delete'>
                            <input type='hidden' name='checktypeid' value='<?php
                            echo $check[ 'checktypeid' ];
                            ?> ' />
                            <input type='hidden' name='pid' value='<?php
                            echo $check[ 'pid' ];
                            ?> ' />
                            <input type='hidden' name='umn' value='<?php
                            echo $check[ 'umn' ];
                            ?> ' />
                            <input type='submit' value='Διαγραφή ελέγχου' title='Διαγραφή' />
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
<p class='create'><a href='check/create'>Προσθήκη νέου ελέγχου</a></p>
