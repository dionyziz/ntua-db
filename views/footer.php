        </div>
        <div id='copy'>
            Άδεια χρήσης MIT. Ανάπτυξη από
            <?php
            $contributors = array(
                'indoril' => 'indorilftw',
                'mastergreg',
                'dionyziz'
            );
            shuffle( $contributors );
            $items = array();
            foreach ( $contributors as $contributor => $url ) {
                if ( is_numeric( $contributor ) ) {
                    $contributor = $url;
                }
                $items[] = '<a href="http://github.com/' . $url . '">' . $contributor . '</a>';
            }
            echo implode( ', ', $items );
            ?>.
        </div>
        <script src='js/jquery.js'></script>
        <script type="text/javascript" src="js/behavior.js"></script>
    </body>
</html>
