<?php
session_start();
require "../../logic_acess.php";
require '../../conexao.php';

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

if ($email === false) {
  $_SESSION["result_email"] = false;
  $_SESSION["erro"] = "E-mail inválido.";
  redireciona("../cadastro/cadastro.php");
}

$sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, crypt(?, gen_salt('bf', 8) ))";

try {
  $conn->beginTransaction();
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute([$nome, $email, $senha]);
  $conn->commit();

  if ($result === true) {
    $_SESSION["result_cadastro"] = true;
    redireciona("../login/form-login.php");
    exit(); // Certifique-se de sair após o redirecionamento
  }
} catch (Exception $e) {
  $conn->rollBack();
  $error = $e->getMessage();

  $_SESSION["result_cadastro"] = false;
  $_SESSION["erro"] = "Erro ao cadastrar usuário. Tente novamente mais tarde.";
  redireciona("../cadastro/cadastro.php");
  exit();

  if (stripos($error, "duplicate key") !== false) {
    $_SESSION["result_registro"] = false;
    $_SESSION["erro"] = "O e-mail fornecido já está registrado. Por favor, use um e-mail diferente.";
    redireciona("../cadastro/cadastro.php");
    exit();
  }
}
?>
