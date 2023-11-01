<?php
session_start();
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
    if (isset($_SESSION['InsertTrue']) && $_SESSION['InsertTrue'] == true) {

    ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = '../../index.php';
            }, 500); // 1000 milissegundos = 1 segundo
        </script>
        <div class="container p-5 d-flex justify-content-center flex-column p-5 text-center alert alert-success " role="alert">
            <h2 class="fs-1 p-5 font">Cadastro Realizado com Sucesso</h2>
        </div>
    <?php

    } else {
        unset($_SESSION['InsertTrue']);

    ?>
        <div class="container p-5 d-flex justify-content-center flex-column p-5 text-center alert alert-danger " role="alert">
            <h2 class="fs-1 p-5 font">Falha ao realizar o <b>cadastro</b></h2>
        </div>
    <?php


    }
    ?>

</body>

</html>