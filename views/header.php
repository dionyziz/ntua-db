<!doctype html>
<!--
    Developer: Dionysis "dionyziz" Zindros <dionyziz@gmail.com>
-->
<html>
    <head>
        <title><?php
        if ( $loggedin ) {
            if ( $name != NULL ) {
                echo $name . "'";
            }
            else {
                echo $_SESSION[ 'user' ][ 'name' ] . "'";
            }
        }
        else {
            echo "Your";
        }
        ?> life</title>
        <base href="<?php
        global $settings;
        echo $settings[ 'url' ];
        ?>" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
        <meta charset="utf-8" />
    </head>
    <body>
