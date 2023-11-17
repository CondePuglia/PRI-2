<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
require "../../conexao.php";



$dtaini = filter_input(INPUT_POST, "dtaini", FILTER_SANITIZE_SPECIAL_CHARS);
$dtafim = filter_input(INPUT_POST, "dtafim", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT  a.valortemp, a.valorlumi, a.valorumi
    FROM dados_ambiente a 
    INNER JOIN local l ON a.codsen = l.codsen 
    WHERE datacaptura BETWEEN ? AND ? ORDER BY datacaptura ASC";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$dtaini, $dtafim]);


if ($stmt->rowCount() === 0) {
    echo json_encode(['existe_valores' => false]);
} elseif ($stmt->rowCount() > 0) {
    echo json_encode(['existe_valores' => true]);
} else {
    echo json_encode(['error' => 'Método de requisição inválido']);
}
