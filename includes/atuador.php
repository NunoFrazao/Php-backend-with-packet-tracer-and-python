<?php

# ===============================================================
# SELECT de todos os atuadores
# ===============================================================
$stmtent = $conn->prepare("SELECT * FROM `atuador`");

# Run query
$result_set = $stmtent->execute();

if ($result_set) {
    # Cria variáveis para associar aos valores da query
    $stmtent->bind_result($id, $nome, $valor, $estado, $tipo, $atualizacao);

    # Associa os valores e mete dentro de um vetor 
    while ($stmtent->fetch()) {
        $atuador = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'tipo' => $tipo, 'atualizacao' => $atualizacao);
        
        # ($atuador->nome == "trinco") ? $trincs = 1 : $trincs = 0;
        $atuadores_array[] = $atuador;
    }
} else {
        $code = $stmtent->errno; # error code of the most recent operation
        $message = $stmtent->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
}

# ===============================================================
# SELECT de um atuador especifico
# ===============================================================
if (isset($_GET["nome"])) {
    $nome = $_GET["nome"];

    $stmtent2 = $conn->prepare("SELECT * FROM `atuador` WHERE `nome` = '$nome'");

    # Run query
    $result_set2 = $stmtent2->execute();

    if ($result_set2) {
        # Cria variáveis para associar aos valores da query
        $stmtent2->bind_result($id, $nome, $valor, $estado, $tipo, $atualizacao);

        # Associa os valores e mete dentro de um vetor
        while ($stmtent2->fetch()) {
            $atuador_one = array('id' => $id, 'nome' => $nome, 'valor' => $valor, 'estado' => $estado, 'tipo' => $tipo, 'atualizacao' => $atualizacao);

            $atuadores_one_array[] = $atuador_one;
        }
    } else {
        $code = $stmtent2->errno; # error code of the most recent operation
        $message = $stmt->error; # error message of the most recent op.
        printf("<p>Query error: %d %s</p>", $code, $message);
    }
}

?>