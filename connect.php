<?php
$host = "localhost";
$user = "root";
$dbpass = "";
$database = "projeto_ti";
$conn = new mysqli($host, $user, $dbpass, $database, 3306);

mysqli_set_charset($conn, 'utf8');