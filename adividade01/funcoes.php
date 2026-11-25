
<?php

function conecta($usuario, $senha) {

    if ($usuario === "admin" && $senha === "1234") {

        header("Location: painel.php");
        exit;

    } else {

        // Codifica a mensagem para evitar problemas com acentuação
        $msg = urlencode("Usuário ou senha inválidos!");

        header("Location: index.php?msg=$msg");
        exit;

    }

}

?>
