<?php
session_start();
require "../../logic_acess.php";
require '../../conexao.php';

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);

if ($email == false) {
    $_SESSION["result_login"] = false;
    $_SESSION["erro"] = "E-mail inválido.";
    redireciona("../inicio/inicio.php");
    exit();
} 

$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);


if (empty($email) || empty($senha)) {
    $_SESSION["result_login"] = false;
    $_SESSION["erro"] = "Por favor, preencha todos os campos.";
    redireciona("../inicio/inicio.php");
    exit();
}





$sql = "SELECT codusu,nome,email,senha FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);

try {
    $stmt->execute([$email]);
    $row = $stmt->fetch();

    if ($row && password_verify($senha, $row['senha'])) {
    
        $_SESSION["email"] = $email;
        $_SESSION["nome"] = $row['nome'];
        $_SESSION["codusu"] = $row['codusu'];
        $_SESSION["result_login"] = true;
        redireciona("../graficos/grafico.php");
    } else {

        unset($_SESSION["email"]);
        unset($_SESSION["nome"]);
        $_SESSION["result_login"] = false;
        $_SESSION["erro"] = "Erro ao fazer login. Tente novamente.";
        redireciona("../inicio/inicio.php");
    }
}  catch (PDOException $e) {
   
    $_SESSION["result_login"] = false;
    $_SESSION["erro"] = "Erro no banco de dados. Tente novamente mais tarde";
    redireciona("../inicio/inicio.php");
} catch (Exception $e) {

    $_SESSION["result_login"] = false;
    $_SESSION["erro"] = "Ocorreu um erro inesperado. Tente novamente mais tarde";
    redireciona("../inicio/inicio.php");
}


