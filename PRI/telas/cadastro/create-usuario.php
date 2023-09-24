<?php
session_start();
require "../../logic_acess.php";

require '../header.php';

require '../../conexao.php';


$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST,"senha");

/*
ATENÇÃO AO HASH DA SENHA

password_hash - Cria um password hash

https://www.php.nre/manual/pt_BR/function.password-hash.php
*/
$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

/*
INSERT INTO `usuarios`( `nome`, `email`, `senha`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
*/
$sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $email, $senha_hash]);

if($result == true){
  $_SESSION['InsertTrue'] = true;
 

 header("Location: modal.php");
 exit();
 ?>
<?php
}else{
//não deu certo, erro 
$errorArray = $stmt->errorInfo();

$_SESSION['InsertTrue'] = false;

header("Location: modal.php");
exit();
?>

<?php

}
require '../footer.php';
?>


