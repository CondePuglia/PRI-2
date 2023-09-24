<?php
session_start();
require "../../logic_acess.php";

require '../header.php';
?>
<?php
require '../../conexao.php';

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_SPECIAL_CHARS);



$sql = "SELECT codusu,nome,senha FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([$email]);

$row = $stmt->fetch();




if (password_verify($senha, $row['senha'])){
    //DEU CERTO

    $_SESSION["email"] = $email;
    $_SESSION["nome"] = $row['nome'];
    $_SESSION["codusu"] = $row['codusu'];
    ?>
 <div class="alert alert-success" role="alert">
  <h4>Autenticado com sucesso.</h4>
</div>
<?php
}else{
    //NÃO DEU CERTO, SENHA OU EMAIL ERRADO

    unset( $_SESSION["email"]);
    unset( $_SESSION["nome"]);
    ?>
<div class="alert alert-danger" role="alert">
  <h4>Falha ao efetuar autenticação.</h4>
  <p>Usuário ou senha incorretos</p>
</div>
<?php
}



?>
<script type="text/javascript">
       setTimeout(function () {
        window.location.href = '../graficos/grafico.php';
        }, 1000); // 5000 milissegundos = 5 segundos
    </script> 
</body>
</html>