<?php
session_start();
require "../../logic_acess.php";
require '../header.php';

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

require '../../conexao.php';

if (codusu() != $_SESSION["codusu"]) {
    $_SESSION["result_local"] = false;
    $_SESSION["erro"] = "Operação não permitida";
    redireciona("../inicio/inicio.php");
    die();
}

$codsen = filter_input(INPUT_GET, "codsen", FILTER_SANITIZE_NUMBER_INT);

if (autenticado()) {
    $sql = "DELETE FROM local WHERE codsen = ?;";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$codsen]);

        $count = $stmt->rowCount();

        if ($result == true && $count >= 1) {
            redireciona("../perfil/perfil.php");
            exit;
        } elseif ($count == 0) {

            if (stripos($error, "fk_dados_ambiente_local") !== false) {
                $error = "Atenção: não é possível excluir o local, pois possui dados ambientais armazenados nele.";
            }

            $_SESSION["result_local"] = false;
            $_SESSION["erro"] = "Nenhum registro encontrado para excluir.";
        } else {
          
            $_SESSION["result_local"] = false;
            $_SESSION["erro"] = "Erro ao excluir o registro.";
        }
    } catch (\Throwable $th) {

        $_SESSION["result_local"] = false;
        $_SESSION["erro"] = "Erro inesperado: " . $th->getMessage();
    }

    redireciona("../perfil/perfil.php");
    exit();
}
?>
