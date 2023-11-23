<?php
session_start();
require "../../logic_acess.php";
require '../../conexao.php';

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

if (autenticado()) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nome) || trim($nome) === '') {
        $_SESSION["result_nome"] = false;
        $_SESSION["erro"] = "O nome não pode estar vazio ou conter apenas espaços em branco.";
        redireciona("../perfil/perfil.php");
        exit();
    }

    try {
        $conn->beginTransaction();

        $sql =  "SELECT nome FROM usuario WHERE codusu = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$_SESSION['codusu']]);
        $row = $stmt->fetch();

        if ($result && $row['nome'] == $nome) {
            $_SESSION["result_nome"] = false;
            $_SESSION["erro"] = "O novo nome deve ser diferente do nome atual.";
            redireciona("../perfil/perfil.php");
            exit();
        }

        $sql =  "UPDATE usuario SET nome = ? WHERE codusu = ? AND nome <> ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nome, $_SESSION['codusu'], $nome]);

        $count = $stmt->rowCount();

        if ($result == true) {
            if ($count > 0) {
                unset($_SESSION['nome']);

                $sql = "SELECT nome FROM usuario WHERE codusu = ?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$_SESSION['codusu']]);

                if ($result == true) {
                    $row =  $stmt->fetch();
                    $novoNome = $row["nome"];
                    $_SESSION['nome'] = $novoNome;
                    redireciona("../perfil/perfil.php");
                } else {
                    throw new Exception("Erro ao recuperar o novo nome.");
                }
            } else {
                throw new Exception("Nenhum registro encontrado para atualizar.");
            }
        } else {
            throw new Exception("Erro ao atualizar o nome.");
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        $_SESSION["result_nome"] = false;
        $_SESSION["erro"] = $e->getMessage();
        redireciona("../perfil/perfil.php");
        exit();
    }
}
?>
