<?php
    include 'header.php';
?>
<html>
    <head>
        <title>Aviation Unit Testing</title>
    </head>
    <body>
        <h1>Aviation Unit Testing</h1>
        <?php
            include 'tests/base.php';

            function runTest( $file ) {
                $unittest = include 'tests/' . $file;
                return $unittest->run();
            }

            if ( $dh = opendir( 'tests' ) ) {
                while ( ( $file = readdir( $dh ) ) !== false ) {
                    switch ( $file ) {
                        case '.':
                        case '..':
                        case 'base.php':
                            break;
                        default:
                            if ( substr( $file, -3 ) == 'php' ) {
                                $result = runTest( $file );
                                ?><h2><?php
                                echo $result->name;
                                ?></h2>
                                
                                <ul><?php
                                foreach ( $result->testcases as $testcase ) {
                                    ?><li><?php
                                    echo htmlspecialchars( $testcase->name );
                                    ?>: <?php
                                    if ( $testcase->passed ) {
                                        ?><strong>PASS</strong><?php
                                    }
                                    else {
                                        ?><strong>FAIL:</strong> <?php
                                        echo $testcase->failReason;
                                    }
                                    ?></li><?php
                                }
                                ?></ul><?php
                            }
                    }
                }
                closedir( $dh );
            }
        ?>
    </body>
</html>
