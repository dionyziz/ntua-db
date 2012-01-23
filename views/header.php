<!doctype html>
<!--
    Developer: Dionysis "dionyziz" Zindros <dionyziz@gmail.com>
-->
<html>
    <head>
        <title>Διεθνής Αερολιμένας Αθηνών - Ελευθέριος Βενιζέλος</title>
        <base href="<?php
        global $settings;
        echo $settings[ 'url' ];
        ?>" />
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/anytime.css" />
        <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
        <script src="js/anytime.js"></script>
        <link href="css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
        <script src="js/jquery-ui-1.8.17.custom.min.js"></script>

        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <body>
        <h1><a href=''><img src='images/logo.gif' alt='Athens International Airport'></a></h1>
        <ul id='navigation'>
            <li><a href='plane/listing'>Αεροσκάφη</a></li>
            <li><a href='check/listing'>Έλεγχοι</a></li>
            <li><a href='employee/listing'>Εργαζόμενοι</a></li>
        </ul>
        <div id='universe'>
