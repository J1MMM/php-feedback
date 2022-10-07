<?php
    define('DB_HOST', 'sql6.freesqldatabase.com');
    define('DB_USER', 'sql6524878');
    define('DB_PASS', 'CwlIr6bsE7');
    define('DB_NAME', 'sql6524878');

    //connection
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //check connection
    if($connect->connect_error) return die('Connection failed' . $connect->connect_error);

    // echo 'DB Connected!';
    