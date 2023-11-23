<?php
require "../header.php";

require '../../conexao.php';
?>

<div class="container cp2 p-5">
    <div class="row ">
        <div class="col-4 offset-4">
            <?php
            if (isset($_SESSION["result_email"]) || isset($_SESSION["result_cadastro"]) || isset($_SESSION["result_registro"])) {
                if (
                    !isset($_SESSION["result_email"]) || !isset($_SESSION["result_cadastro"]) || !isset($_SESSION["result_registro"]) ||
                    !$_SESSION["result_email"] || !$_SESSION["result_cadastro"]  || !$_SESSION["result_registro"]
                ) {


                    $erro = $_SESSION["erro"];
                    unset($_SESSION["erro"]);


            ?>

                    <div id="modal-overlay" style="display: <?php echo (isset($_SESSION["result_email"]) || isset($_SESSION["result_cadastro"]) || isset($_SESSION["result_registro"])) ? 'flex' : 'none'; ?>;">
                        <div id="mensagemErro" class="cp2 p-5 men">
                            <h4 class="arvo fs-1 fw-bold text-danger">Ocorreu uma falha</h4>
                            <hr>
                            <p class="raleway fw-bold text-danger fs-3"><?php echo $erro; ?></p>
                        </div>
                    </div>

            <?php

                }
                unset($_SESSION["result_email"]);
                unset($_SESSION["result_cadastro"]);
                unset($_SESSION["result_registro"]);
            }
            ?>
        </div>
    </div>
    <section class="section-1 cp2 p-5 mb-3">
        <h1 class="arvo cp3c ti">Formulário de Cadastro</h1>
    </section>
    <hr class="border-cp3">
    <section class="section-2 cp2 p-5 mb-3">
        <form action="create-usuario.php" method="post" id="form" class="form-control p-5">
            <div class="mb-3">
                <label for="name" class="form-label mm2 raleway fw-bold cp1">Nome de Usuário:</label>
                <input type="text" class="form-control required raleway fw-bolder" oninput="nameValidate()" id="name" name="nome" placeholder="Digite seu nome">
                <span class="hidden mp2">Digite um nome válido, deve conter no mínimo 6 caracteres, incluindo letras, números e espaços.</span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mm2 raleway  fw-bold cp1">Email:</label>
                <input type="email" class="form-control required raleway fw-bolder" oninput="emailValidate()" id="email" name="email" placeholder="Digite seu email" autocomplete="email">
                <span class="hidden mp2 ">Digite um email válido</span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label mm2 raleway  fw-bold cp1">Senha:</label>
                <input type="password" oninput="mainPasswordValidate()" class="form-control required raleway fw-bold" id="password" name="senha" placeholder="Digite sua senha">
                <span class="hidden mp2">Digite uma senha válida, deve conter no mínimo 8 caracteres</span>
            </div>
            <div class="mb-3">
                <label for="conpassword" class="form-label mm2 raleway  fw-bold cp1 ">Confirme Sua Senha:</label>
                <input type="password" class="form-control required raleway fw-bolder" oninput="comparePassoword()" id="conpassword" placeholder="Repita sua senha">
                <span class="hidden mp2">As senhas devem serem compatíveis</span>
            </div>
            <div class="row my-5 btns">
                <div class="col-2 cadastrar">
                    <button type="submit" class="btn cp3 mm2 arvo cadastrar-btn">Cadastrar</button>
                </div>
                <div class="col-7 limpar">
                    <button type="reset" class="btn cp2-5 mm2 arvo limpar-btn">Limpar</button>
                </div>
                <div class="col-3 coluu">
                    <p class="raleway baixo"><small>Já Possui Conta?<a href="../login/form-login.php" class="fw-bold">Clique Aqui</a></small></p>
                </div>
            </div>
        </form>

    </section>
</div>
<?php
require "../footer.php"
?>