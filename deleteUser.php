<?php
include "connect.php";
$id = $_GET['id'];

$sql = "DELETE FROM `utilizador` WHERE `utilizador`.id = '$id'";

# Run query
$result_set = $conn->query($sql);

if ($result_set) {
    session_start();
    session_unset();
    session_destroy();
    header('location: index.php?pagina=login.php');
    exit(0);
}
