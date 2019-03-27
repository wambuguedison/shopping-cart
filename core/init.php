<?php
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "our_shop";

    $connect = mysqli_connect($host, $username, $password, $db);
    if (mysqli_connect_errno()) {
        echo "couldn't connect to database due to :".mysqli_connect_error();
        die();
    }

    define("BASEURL", $_SERVER['DOCUMENT_ROOT']."/projects/shop/");
    require_once BASEURL."includes/functions.php";