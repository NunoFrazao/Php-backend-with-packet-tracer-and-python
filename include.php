<?php
include "connect.php";

# GET nome and micro type from url
$nome_get = (array_key_exists('nome', $_GET) ? $_GET['nome'] : '');
$micro = (array_key_exists('micro', $_GET) ? $_GET['micro'] : '');
$campos_array = [];
$count = 0;

# Include sensores & atuadores
include "includes/sensor.php";
include "includes/atuador.php";

# Arrays with querys from sensores & atuadores
$type = [$sensores_array, $atuadores_array];
$type_name = ["sensor", "atuador"];

# ===============================================================
# SELECT dos logs para cada sensor/atuador
# ===============================================================
if (isset($_GET["micro"])) {
    # GET tipo from url
    $tipo = "logs_" . $_GET["micro"];

    # Get all from table atuador or sensor
    $stmt = $conn->prepare("SELECT * FROM $tipo WHERE `nome` = '$nome_get' ORDER BY id DESC");

    # Run query
    $result = $stmt->execute();
    if ($result) {
        # Cria variáveis para associar aos valores da query
        $stmt->bind_result($id, $nome, $valor, $estado, $atualizacao);
        # Se encontrar pelo menos uma linha
        # Associa os valores e mete dentro de um vetor 
        while ($stmt->fetch()) {
            $campos = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'atualizacao' => $atualizacao);
            # Guardar num array
            $campos_array[] = $campos;
        }
    } else {
        $code = $stmt->errno; # error code of the most recent operation
        $message = $stmt->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
    }

    $stmt->free_result();
    $stmt->close();
}

# ===============================================================
# SELECT de todos os logs
# ===============================================================
if (isset($_GET["allhistory"])) {
    # Array com o nome dos dois logs
    $allHist = ["logs_sensor", "logs_atuador"];

    # Loop entre os dois logs
    for ($i = 0; $i < 2; $i++) {
        # Get all from table atuador or sensor
        $stmt = $conn->prepare("SELECT * FROM $allHist[$i]");

        # Run query
        $result = $stmt->execute();

        if ($result) {
            # Cria variáveis para associar aos valores da query
            $stmt->bind_result($id, $nome, $valor, $estado, $atualizacao);

            # Associa os valores e mete dentro de um vetor 
            while ($stmt->fetch()) {
                $campos = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'atualizacao' => $atualizacao);
                # Guardar num array
                $campos_array[] = $campos;
            }
        } else {
            $code = $stmt->errno; # error code of the most recent operation
            $message = $stmt->error; # error message of the most recent op.
            printf("<p>Query error: %d %s</p>", $code, $message);
        }
    }
}

# ===============================================================
# SELECT de todos os sensores/atuadores para a pagina all.php 
# ===============================================================
if (isset($_GET["pagina"]) && $_GET["pagina"] == "all.php") {
    $stmt = $conn->prepare("SELECT * FROM $micro");

    #Realiza a query preparada
    $result = $stmt->execute();

    if ($result) {
        #Cria variáveis para associar aos valores da query
        $stmt->bind_result($id, $nome, $valor, $estado, $tipo, $atualizacao);

        # Associa os valores e mete dentro de um vetor 
        while ($stmt->fetch()) {
            $sensor = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'tipo' => $tipo, 'atualizacao' => $atualizacao);
            # Guardar num array
            $sensores[] = $sensor;
        }
    } else {
        $code = $stmt->errno; # error code of the most recent operation
        $message = $stmt->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
    }
}


# ===============================================================
# SELECT all users
# ===============================================================
if (isset($_GET["user"])) {
    $stmt = $conn->prepare("SELECT id, username, email, estatuto FROM `utilizador`");

    # Realiza a query preparada
    $result = $stmt->execute();
    if ($result) {
        #Cria variáveis para associar aos valores da query
        $stmt->bind_result($id, $username, $email, $estatuto);

        # Associa os valores e mete dentro de um vetor 
        while ($stmt->fetch()) {
            $user = array('id' => $id, 'username' => $username, 'email' => $email, 'estatuto' => $estatuto);
            # Guardar num array
            $users[] = $user;
        }
    } else {
        $code = $stmt->errno; # error code of the most recent operation
        $message = $stmt->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
    }
}

# ===============================================================
# SELECT logged in user
# ===============================================================
if (isset($_GET['utilizador'])) {
    $user = $_GET['utilizador'];

    # Selecionar o utilizador logado
    $query = ("SELECT * FROM `utilizador` WHERE username = '$user'");

    # Run query
    $result_set = $conn->query($query);

    if ($result_set) {
        while ($row = mysqli_fetch_array($result_set)) {
            # Igualar os campos a variãveis
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $estatuto = $row['estatuto'];
        }
    } else {
        $code = $conn->errno;
        $message = $conn->error;
        printf("<p>Query error: %d, %s</p>", $code, $message);
    }

    # Count all users
    $sql = ("SELECT count(*) FROM `utilizador`");
    # Run query
    $result_set = $conn->query($sql);
    $count_users = mysqli_fetch_assoc($result_set);
}