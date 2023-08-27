<?php
    require "../header.php"
    ?>
<body class="cp1">
    <div class="container">
            
        <div class="form-image">
            <figure>
                <img src="img/undraw_access_account_re_8spm.svg" alt="login">
            </figure>
        </div>

        <div class="form">
            <form action="" method="POST" class="form-control form-control-retangulo">
                <fieldset>
                <div class="form-header">
                    <div class="title arvo">
                        <h1>Login</h1>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label raleway  fw-bold">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3"> 
                    <label for="senha" class="form-label raleway  fw-bold ">Senha: </label>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>
                <div class="avisos">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label raleway  fw-bold" for="remember">Relembre-me</label>
                </div>
                <div class="form-text raleway  fw-bold"><a href="">Esqueceu a senha?</a>
                </div></div> 
                <button type="submit" class="btn button-entrar">Entrar</button>
                <div class="form-text"> Não tem uma conta?<a href="../cadastro/cadastro.php">Cadastre-se</a></div> 
                </fieldset>
            </form>
        </div>


    </div>
</body>

</html>