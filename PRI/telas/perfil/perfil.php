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

<div class="flex-column flex-grow-1">
    <div class="flex-grow-1 bg-body">
        <h1 class="arvo text-center fw-bold cp3">Perfil de Usuário</h1>

        <div class="cd3 p-5">
            <h2 class="mx-5 mb-5 fw-bold text-white">Suas Informações:</h2>
            <form action="alterar-nome.php" method="post">
                <div class="row">
                    <div class="form-floating mb-5 col-8 offset-1">
                        <input type="text" class="form-control raleway fw-bolder" id="usuario" placeholder="name@example.com" disabled="" name="nome" value="<?= $row['nome'] ?>">
                        <label for="usuario" class="raleway fw-semibold">Nome</label>
                    </div>
                    <div class="me-3 col-1">
                        <button type="button" class="btn btn-warning arvo  fw-bold" id="alterar" title="alterar">Alterar <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg></button>
                    </div>
                </div>
                <div class="row">
                    <div class="form-floating mb-5 col-8 offset-1">
                        <input type="email" class="form-control raleway fw-bolder" id="floatingInput1" placeholder="name@example.com" disabled="" value="<?= $row['email'] ?>">
                        <label for="floatingInput1" class="raleway fw-semibold">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-floating col-8 offset-1">
                        <input type="password" class="form-control raleway fw-bolder" id="floatingPassword" placeholder="Password" disabled="" value="<?= $row['senha'] ?>">
                        <label for="floatingPassword" class="raleway fw-semibold">Senha</label>
                    </div>
                </div>

                <!-- Novo botão que ficará oculto inicialmente -->
                <div class="row" id="novoBotaoRow" style="display: none;">
                    <div class="col-8 offset-1">
                        <button type="submit" class="btn btn-warning cp3 my-5" onclick="if(!confirm('Tem certeza que deseja alterar, seu nome?')) return false;">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="mt-5 bg-body ">
        <h1 class="arvo text-center fw-bold cp3">Configurações locais</h1>

        <div class="cd3 p-5">
            <?php
             $sql = "SELECT CodSen, nameLocal FROM local WHERE CodUsu = ?";
             $stmt = $conn->prepare($sql);
             $result = $stmt->execute([$_SESSION['codusu']]);
             $count = $stmt->rowCount();

            if ($count == 0) {

            ?>
                <div class="alert alert-warning" role="alert">
                    <h4>Atenção</h4>
                    <p>Não há nenhum registro na tabela <b>locais</b></p>
                </div>
            <?php
            } else {
            ?>
                <div class="table-responsive cd3">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N° Local</th>
                                <th scope="col">Nome do Local</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $stmt->fetch()) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $row["codsen"] ?></th>
                                    <td><?= $row["namelocal"] ?></td>
                                    <td>
                                <a class="btn btn-sm btn-danger" href="excluir-local.php?codsen=<?= $row["codsen"]; ?>" onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                                    <span data-feather="trash-2"></span>
                                    Excluir
                                </a>
                            </td>
                                </tr>

                            <?php

                        }
                            ?>
                            </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>
</div>

<?php

require "../footer.php"

?>