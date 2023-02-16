/* Mudar o conteúdo da tag <title> consoante a página */

$(document).ready(() => {

    // Index
    if (window.location.href.includes("index.php")) {
        $("title").text("Carro | Página Inicial");
    }

    /* ----------- Sensores ----------- */

    // Sensor temperatura
    if (window.location.href.includes("sensores/sensor.php&nome=temperatura")) {
        $("title").text("Carro | Sensor Temperatura");
    }

    // Sensor portas
    if (window.location.href.includes("sensores/sensor.php&nome=porta")) {
        $("title").text("Carro | Sensor Portas");
    }
    
    // Sensor portas
    if (window.location.href.includes("sensores/sensor.php&nome=luz")) {
        $("title").text("Carro | Sensor Luz");
    }

    // Sensor all
    if (window.location.href.includes("sensores/all.php")) {
        $("title").text("Carro | Todos sensores");
    }

    /* ----------- Atuadores ----------- */

    // Atuador
    if (window.location.href.includes("atuadores")) {
        $("title").text("Carro | Atuador");
    }

    // Atuador ar condicionado
    if (window.location.href.includes("atuadores/atuador.php&nome=ar_condicionado")) {
        $("title").text("Carro | Atuador Ar Condicinado");
    }

    // Atuador aquecimento
    if (window.location.href.includes("atuadores/atuador.php&nome=aquecimento")) {
        $("title").text("Carro | Atuador Aquecimento");
    }

     // Atuador trinco
    if (window.location.href.includes("atuadores/atuador.php&nome=trinco")) {
        $("title").text("Carro | Atuador Trinco");
    }

    // Atuador all
    if (window.location.href.includes("atuadores/all.php")) {
        $("title").text("Carro | Todos atuadores");
    }

    /* ----------- Others ----------- */

    // History
    if (window.location.href.includes("history.php")) {
        $("title").text("Carro | Histórico");
    }

    // Users
    if (window.location.href.includes("users.php")) {
        $("title").text("Carro | Utilizadores");
    }

    // Options
    if (window.location.href.includes("options.php")) {
        $("title").text("Carro | Definições");
    }
});