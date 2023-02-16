<?php
session_start();
$username = (array_key_exists("username", $_POST) ? $_POST["username"] : "");
$password = (array_key_exists("password", $_POST) ? $_POST["password"] : "");
$msg_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # If any input is empty
    if ($username == "" || $password == "") {
        # Variable msg_erro gets a message
        $msg_erro = "Nome e palavra-passe obrigatórios";
    } else {
        require_once "connect.php";
        if ($conn->connect_errno) {
            $code = $conn->connect_errno; # error code of the most recent operation
            $message = $conn->connect_errno; # error message of the most recent op.
            $msg_erro = "Falha na ligação à BD";
        } else {
            # SHA512 Hash password
            $password = hash("sha512", $password);

            # Get name and password from utilizador with same credentials
            $query = "SELECT `username`, `password`, `estatuto` FROM `utilizador` WHERE username = '$username' AND password = '$password'";

            # Run query
            $result_set = $conn->query($query);
            if ($result_set) {
                # If there is a match
                if ($result_set->num_rows == 1) {
                    while ($row = $result_set->fetch_assoc()) {
                        $_SESSION['estatuto'] = $row['estatuto'];
                    }
                    $_SESSION['authenticated'] = true;
                    $_SESSION['username'] = $username;
                    
                    # Redirect to dashboard
                    header('Location: index.php?pagina=dashboard.php');
                    exit(0);
                } else {
                    # Variable msg_erro gets a message
                    $msg_erro = "Credenciais inválida";
                }
            } else {
                $code = $conn->connect_errno; # error code of the most recent operation
                $message = $conn->connect_errno; # error message of the most recent op.
                $msg_erro = "Falha na ligação à BD";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Car company">
    <meta name="author" content="José Parreira, Nuno Frazão">
    <title>Car | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- LINKS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="form-div" class="col-md-7 full-cols">

                <!-- Form -->
                <form class="form_login" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <h2 class="mb-5">Car company</h2>
                    <!-- Username -->
                    <div class="mb-3 relative-divs">
                        <label for="username" class="form-label">
                            <svg viewBox="0 0 448 512" width="16" height="16"><path fill="#fff" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                        </label>
                        <input name="username" placeholder="Escreva o nome" type="text" class="form-control" id="username">
                    </div>

                    <!-- Password -->
                    <div class="mb-3 relative-divs">
                        <label for="password" class="form-label">
                            <svg viewBox="0 0 448 512" width="16" height="16"><path fill="#fff" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
                        </label>
                        <input name="password" placeholder="Escreva a palavra-passe" type="password" class="form-control" id="password">
                    </div>
                    <span class="small text-danger text-center d-block"><?= $msg_erro ?></span>
                    <div class="text-center">
                        <button type="submit" class="btn mt-3">Submeter</button>
                    </div>
                </form>
            </div>
            <div id="img-body" class="col-md-5 full-cols"></div>
        </div>
    </div>

    <!-- CDNS & DOCS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>