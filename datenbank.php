<?php
    $host = "localhost";
    $dbase = "firmaxyz";

    $user = "root";
    $pwd = "";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbase", "$user", "$pwd");
    }
    catch(PDOException $e) {
        print("Da hat etwas nicht geklappt!<br />");
    }
?>