<?php



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
echo "<p><b>Nome: </b> $nome</p>";
echo "<p><b>E-mail: </b> $email</p>";
echo "<p><b>Senha hash: </b> $senha_hash</p>";

/*
INSERT INTO `usuarios`( `nome`, `email`, `senha`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
*/
$sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $email, $senha_hash]);

if($result == true){
 // deu certo o insert
 ?>
 <div class="alert alert-success" role="alert">
  <h4>Dados gravados com sucesso.</h4>
</div>
<?php
}else{
//não deu certo, erro 
$errorArray = $stmt->errorInfo();
?>
<div class="alert alert-danger" role="alert">
  <h4>Falha ao efetuar gravação.</h4>
  <p><?= $errorArray[2]; ?></p>
</div>
<?php
}
require '../footer.php';
?>