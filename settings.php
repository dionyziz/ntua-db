<?php
    $settingsLocal = include 'settings-local.php';
    $settingsGlobal = array(
        'db' => array(
            'username' => 'aviation',
            'password' => 'password',
            'database' => 'aviation'
        ),
        'url' => 'http://dionyziz.kamibu.com/aviation/',
        // do not override these in your local settings; we want to share a common upload directory
        'uploaddir' => '/var/www/kamibu.com/dionyziz/aviation/uploads/',
        'uploadurl' => 'http://dionyziz.kamibu.com/aviation/uploads/'
    );

    foreach ( $settingsLocal as $key => $setting ) {
        $settingsGlobal[ $key ] = $setting;
    }
    return $settingsGlobal;
?>
