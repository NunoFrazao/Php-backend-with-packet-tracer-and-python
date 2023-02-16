<?php
require_once "../connect.php";
$request = $_SERVER['REQUEST_METHOD'];
header('Content-Type: text/html; charset=utf-8');

# ===============================================================
# REQUEST METHOD == POST
# ===============================================================
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    # Alterar Estado do Sensor
    if ($_POST['microcontrolador']) {

        # Tipo de microcontrolador
        ($_POST['microcontrolador'] == 'atuador') ? $microcontrolador = 'atuador' : $microcontrolador = 'sensor';

        if (isset($_POST['valor']) || isset($_POST['estado'])) {
            $nome = $_POST['nome'];
            # Se existir fica com o valor senão fica com -1
            $valor = (array_key_exists('valor', $_POST) ? $_POST['valor'] : '-1');
            $estado = (array_key_exists('estado', $_POST) ? $_POST['estado'] : '-1');

            # Alterar estado do sensor/atuador para desligado na base de dados
            $sql = "UPDATE $microcontrolador SET valor= '$valor', estado = '$estado' WHERE nome='$nome'";

            if ($conn->query($sql) === TRUE) {
                # Redirect to last page
                header("Location: http://projeto.test/?pagina=atuadores/atuador.php&nome=$nome&micro=atuador&microcontrolador");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            # Inserir os valores do sensor/atuador
            $sql = "INSERT INTO logs_$microcontrolador (nome, valor, estado) VALUES ('$nome', '$valor', '$estado')";

            if ($conn->query($sql) === TRUE) {
                echo "Tabela logs_sensor atualizada \n";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
# ===============================================================
# REQUEST METHOD == GET
# ===============================================================
else if ($_SERVER['REQUEST_METHOD'] == "GET") {

    # Se existir um "microcontrolador" no url
    if ($_GET['microcontrolador']) {

        # Tipo de microcontrolador
        ($_GET['microcontrolador'] == 'atuador' ? $microcontrolador = 'atuador' : $microcontrolador = 'sensor');

        $nome = $_GET['nome'];

        # Selecionar todos da tabela dos sensores/atuadores
        $sql = "SELECT * FROM `$microcontrolador` WHERE `nome` = '$nome'";

        # Run query
        $resultado = $conn->query($sql);

        # Se existir pelo menos um resultado
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                # Guardar valores num array
                $array_campos = array($row["nome"], " ", $row["valor"], " ", $row["estado"]);
                # Passar de array para string
                echo implode($array_campos);
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Metodo não permitido!";
}
