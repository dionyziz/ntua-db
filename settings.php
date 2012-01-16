<?php
    $settingsLocal = include 'settings-local.php';
    $settingsGlobal = array(
        'db' => array(
            'username' => 'aviation',
            'password' => 'password',
            'database' => 'aviation'
        ),
        'url' => 'http://dionyziz.kamibu.com/aviation'
    );

    foreach ( $settingsLocal as $key => $setting ) {
        $settingsGlobal[ $key ] = $setting;
    }
    return $settingsGlobal;
?>
