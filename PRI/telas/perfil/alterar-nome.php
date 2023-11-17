<?php

use PgSql\Result;

session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Immersus</title>
    <link rel="icon" href="../icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../styles_global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Courgette&family=Raleway:wght@100&display=swap" rel="stylesheet">
</head>

<body class="d-flex justify-content-center  flex-column">
    <?php
    require '../../conexao.php';

    if (autenticado()) {
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);


        $sql =  "UPDATE usuario SET nome = ? WHERE codusu = ? AND nome <> ?";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nome, $_SESSION['codusu'], $nome]);

        $count = $stmt->rowCount();
        if ($result == true) {
            if ($count > 0) {
                // Os dados foram atualizados
    ?>
                <div class="container  d-flex justify-content-center flex-column p-5 text-center alert alert-success " role="alert">
                    <h2 class="fs-1 p-5 font">Dados alterados com Sucesso</h2>
                    <?php
                    unset($_SESSION['nome']);
                    $sql = "SELECT nome FROM usuario WHERE codusu = ?";
                    $stmt = $conn->prepare($sql);
                    $result = $stmt->execute([$_SESSION['codusu']]);

                    if ($result == true) {
                        $row =  $stmt->fetch() ;
                        $nome = $row["nome"];
                        $_SESSION['nome'] = $nome; 
                    }
                    ?>
                </div>
            <?php
            } else {
               
            ?>
                <div class="container p-5 d-flex justify-content-center flex-column p-5 text-center alert alert-secondary " role="alert">
                    <h2 class="fs-1 p-5 font">Nenhum dado modificado</h2>
                </div>
            <?php
            }
        } else {
            $errorArray = $stmt->errorInfo();
            ?>
            <div class="container p-5 d-flex justify-content-center flex-column p-5 text-center alert alert-danger  " role="alert">
                <h2 class="fs-1 p-5 font">Erro ao modificar dados</h2>
                <p><?= $errorArray[2]; ?></p>
            </div>
    <?php
        }
    }
    ?>
    <script type="text/javascript">
        setTimeout(function() {
            window.location.href = '../perfil/perfil.php';
        }, 1000);
    </script>