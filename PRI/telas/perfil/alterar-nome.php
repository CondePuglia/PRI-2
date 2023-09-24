<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
require '../header.php';
require '../../conexao.php';

if(autenticado()){
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "UPDATE usuario SET nome = ? WHERE codusu = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $_SESSION['codusu']]); // Correção aqui

$count = $stmt->rowCount();
if ($result == true && $count >= 1) {
    // deu certo o update
    ?>
    <div class="alert alert-success" role="alert">
        <h4>Dados alterados com sucesso.</h4>
    </div>
<?php
} elseif ($result == true && $count == 0) {
    ?>
    <div class="alert alert-secondary" role="alert">
        <h4>Nenhum dado foi alterado.</h4>
    </div>
<?php
} else {
    // não deu certo, erro
    $errorArray = $stmt->errorInfo();
    ?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao efetuar gravação.</h4>
        <p><?= $errorArray[2]; ?></p>
    </div>
<?php
}}
?>
<script type="text/javascript">
       setTimeout(function () {
        window.location.href = '../perfil/perfil.php';
        }, 1000); // 5000 milissegundos = 5 segundos
    </script> 