<?php
session_start();
require "../../logic_acess.php";

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
require '../../conexao.php';

$codusu = $_SESSION['codusu'];

if (codusu() != $_SESSION["codusu"]) {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Operação não permitida";
    redireciona("../inicio/inicio.php");
    die();
}
$sql = "DELETE FROM usuario WHERE codusu = ?";
try {
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$codusu]);
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

$count = $stmt->rowCount();

if ($result == true && $count >= 1) {
    redireciona(" ../sair.php");
    die();
} elseif ($count == 0) {
    $_SESSION["result"] = false;

    if (stripos($error, "fK_local_usuario") != false) {
        $error = "Atenção: não é possível excluir a conta, pois possui locais que a utilizam.";
    }
    $_SESSION["erro"] = $error;
    redireciona("../inicio/inicio.php");
    die();
} else {
    //não deu certo, erro 
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
    redireciona("../inicio/inicio.php");
    die();
}
