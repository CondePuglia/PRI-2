<?php
require "../header.php";

require '../../conexao.php';
?>

<div class="container cp2 p-5">
    <section class="section-1 cp2 p-5 mb-3">
        <h1 class="arvo cp3c ti">Formulário de Cadastro</h1>
    </section>
    <hr class="border-cp3">
    <section class="section-2 cp2 p-5 mb-3">
        <form action="create-usuario.php" method="post" id="form" class="form-control p-5">
            <div class="mb-3">
                <label for="name" class="form-label mm2 raleway fw-bold cp1">Nome de Usuário:</label>
                <input type="text" class="form-control required raleway" oninput="nameValidate()" id="name" name="nome" placeholder="Digite seu nome">
                <span class="hidden mp2">Digite um nome válido, deve conter no mínimo 6 caracteres, incluindo letras, números e espaços.</span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mm2 raleway  fw-bold cp1">Email:</label>
                <input type="email" class="form-control required raleway" oninput="emailValidate()" id="email" name="email" placeholder="Digite seu email" autocomplete="email">
                <span class="hidden mp2 ">Digite um email válido</span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label mm2 raleway  fw-bold cp1">Senha:</label>
                <input type="password" oninput="mainPasswordValidate()" class="form-control required raleway" id="password" name="senha" placeholder="Digite sua senha">
                <span class="hidden mp2">Digite uma senha válida, deve conter no mínimo 8 caracteres</span>
            </div>
            <div class="mb-3">
                <label for="conpassword" class="form-label mm2 raleway  fw-bold cp1 ">Confirme Sua Senha:</label>
                <input type="password" class="form-control required raleway" oninput="comparePassoword()" id="conpassword" placeholder="Repita sua senha">
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