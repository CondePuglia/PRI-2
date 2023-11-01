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




$codsen = filter_input(INPUT_GET, "codsen", FILTER_SANITIZE_NUMBER_INT);

if(autenticado()){
/*
DELETE FROM `produtos` WHERE 0
*/
$sql = "DELETE FROM local WHERE codsen = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codsen]);
/* PDOStatement::rowCount

Returns the number of rows affected by the las SQL statement

https://www.php.net/manual/en/pdostatement.rowcount.php

*/

$count = $stmt->rowCount();
if ($result == true && $count >= 1) {
  header("Location: ../perfil/perfil.php");
      exit; // Certifique-se de sair após o redirecionamento
?>
    <div class="alert alert-success" role="alert">
        <h4>Registro excluído com sucesso.</h4>
    </div>

<?php
} elseif ($count == 0) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao efetuar exclusão.</h4>
        <p>Não foi encontrado nenhum registro com o ID = <?= $id ?>.</p>
    </div>
<?php

} else {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao efetuar exclusão.</h4>
        <p><?= $errorArray[2]; ?></p>
    </div>
<?php
}}
?>

</body>
</html>