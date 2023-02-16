<?php

# ===============================================================
# SELECT de todos os sensores
# ===============================================================
$stmt = $conn->prepare("SELECT * FROM `sensor`");

# Run query
$result_set = $stmt->execute();

if ($result_set) {
    # Cria variáveis para associar aos valores da query
    $stmt->bind_result($id, $nome, $valor, $estado, $tipo, $atualizacao);

    # Associa os valores e mete dentro de um vetor 
    while ($stmt->fetch()) {
        $sensor = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'tipo' => $tipo, 'atualizacao' => $atualizacao);
        $sensores_array[] = $sensor;

        if ($sensor['nome'] == 'trinco') {
            $trincs = $sensor['estado'];
        }

    }
} else {
    $code = $stmt->errno; # error code of the most recent operation
    $message = $stmt->error; # error message of the most recent op.
    printf("<p>Query error: %d %s</p>", $code, $message);
}

# ===============================================================
# SELECT de um sensor especifico
# ===============================================================
if (isset($_GET["nome"])) {
    $nome = $_GET["nome"];

    $stmt2 = $conn->prepare("SELECT * FROM `sensor` WHERE `nome` = '$nome'");

    # Run query
    $result_set2 = $stmt2->execute();

    if ($result_set2) {
        # Cria variáveis para associar aos valores da query
        $stmt2->bind_result($id, $nome, $valor, $estado, $tipo, $atualizacao);

        # Associa os valores e mete dentro de um vetor 
        while ($stmt2->fetch()) {
            $sensor_one = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'tipo' => $tipo, 'atualizacao' => $atualizacao);

            $sensores_one_array[] = $sensor_one;
        }
    } else {
        $code = $stmt2->errno; # error code of the most recent operation
        $message = $stmt->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
    }
}

?>