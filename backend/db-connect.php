<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "dbms_user_account";




$con = new mysqli($server, $user, $password, $db);
if (!$con) {
    echo ' <script>alert("Connection error")</script>';
}
