<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
require "../header.php";
require "../menu.php";
$perfil = "perfil.php";
$grafico = "../graficos/grafico.php";
require "../sidebar.php";
require "../../conexao.php";

if (empty($_SESSION['codusu'])) {

?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao abrir formulário para edição.</h4>
        <p>ID do produto está vazio.</p>
    </div>
<?php
    exit;
}


$sql = "SELECT nome,email,senha FROM usuario WHERE codusu = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$_SESSION['codusu']]);

$row = $stmt->fetch();

?>
<div class="flex-grow-1 bg-body">
    <h1 class="arvo text-center fw-bold cp3">Perfil</h1>

    <div class="cd3 p-5">
        <h2 class="mx-5 mb-5 fw-bolder text-white">Suas Informações:</h2>
        <form action="alterar-nome.php" method="post">
            <div class="row">
                <div class="form-floating mb-5 col-8 offset-1">
                    <input type="text" class="form-control raleway fw-medium" id="usuario" placeholder="name@example.com" disabled="" name="nome"value="<?= $row['nome'] ?>">
                    <label for="usuario" class="raleway fw-semibold">Nome</label>
                </div>
                <div class="me-3 col-1">
                    <button type="button" class="btn btn-danger" id="alterar" title="alterar">Alterar</button>
                </div>
            </div>
            <div class="row">
                <div class="form-floating mb-5 col-8 offset-1">
                    <input type="email" class="form-control raleway fw-medium" id="floatingInput1" placeholder="name@example.com" disabled="" value="<?= $row['email'] ?>">
                    <label for="floatingInput1" class="raleway fw-semibold">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="form-floating col-8 offset-1">
                    <input type="password" class="form-control raleway fw-medium" id="floatingPassword" placeholder="Password" disabled="" value="<?= $row['senha'] ?>">
                    <label for="floatingPassword" class="raleway fw-semibold">Senha</label>
                </div>
            </div>

            <!-- Novo botão que ficará oculto inicialmente -->
            <div class="row" id="novoBotaoRow" style="display: none;">
                <div class="col-8 offset-1">
                    <button type="submit" class="btn btn-primary my-5">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?php

require "../footer.php"

?>