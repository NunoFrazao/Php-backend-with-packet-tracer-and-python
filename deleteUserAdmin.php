<?php
include "connect.php";
$id = $_GET['id'];

$sql = "DELETE FROM `utilizador` WHERE `utilizador`.id = '$id'";

# Run query
$result_set = $conn->query($sql);

if ($result_set) {
    header('location: index.php?pagina=users.php&user');
    exit(0);
}
