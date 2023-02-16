<?php
include "connect.php";

# ===============================================================
# IF EXISTS AN "ID" IN URL
# ===============================================================
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    # Validation for sql injection
    $user = $conn->real_escape_string($_POST["username"]);
    $mail = $conn->real_escape_string($_POST["email"]);

    # Update user
    $sql = "UPDATE `utilizador` SET `username` = '$user', `email` = '$mail' WHERE `id` = '$id'";

    # Run query
    $result_set = $conn->query($sql);

    if ($result_set) {
        $_SESSION['username'] = $user;
    } else {
        $code = $conn->errno; # error code of the most recent operation
        $message = $conn->error; # error message of the most recent op.
        $msg_erro = "Falha na query";
    }
    # Destroy session
    session_start();
    session_unset();
    session_destroy();
    # Redirect to login page
    header('location: index.php?pagina=login.php');
    exit(0);   
}

# ===============================================================
# IF EXISTS AN "ADDUSER" IN URL
# ===============================================================
if (isset($_GET["adduser"])) {
    # Validation for sql injection
    $user = $conn->real_escape_string($_POST["username"]);
    $mail = $conn->real_escape_string($_POST["email"]);
    $pass = $conn->real_escape_string($_POST["password"]);

    # SHA512 Hash password
    $password = hash("sha512", $pass);

    # Inserir os valores do sensor/atuador
    $sql = "INSERT INTO `utilizador` (username, password, email, estatuto) VALUES ('$user', '$password', '$mail', 0)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?pagina=users.php&user&success");
    } else {
        header("Location: index.php?pagina=users.php&user&failed");
    }
}