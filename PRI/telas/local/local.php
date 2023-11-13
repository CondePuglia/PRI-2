<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

require "../../conexao.php";


$codusu = filter_input(INPUT_POST,"codusu",FILTER_SANITIZE_NUMBER_INT);
$nameLocal = filter_input(INPUT_POST,"nameLocal",FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "INSERT INTO local (codusu, nameLocal) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codusu, $nameLocal]);

header("Location: ../graficos/grafico.php")
?>