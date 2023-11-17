<?php
    session_start();
    require "../../logic_acess.php";
    if(autenticado()){
        redireciona();
        die;
    }
    require "../header.php";
    require "../../conexao.php";
    ?>
<body class="cp1">
    <div class="container">
            
        <div class="form-image">
            <figure>
                <img src="img/undraw_access_account_re_8spm.svg" alt="login">
            </figure>
        </div>

        <div class="form">
            <form action="login.php" method="POST" class="form-control form-control-retangulo">
                <fieldset>
                <div class="form-header">
                    <div class="title arvo">
                        <h1>Login</h1>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label raleway  fw-bold">Email:</label>
                    <input type="email" class="form-control fw-normal" id="email" name="email" required>
                </div>
                <div class="mb-3"> 
                    <label for="senha" class="form-label raleway  fw-bold ">Senha: </label>
                    <input type="password" class="form-control fw-normal mb-3" name="senha" id="senha" required>
                </div>
                <div class="avisos">
                </div> 
                <button type="submit" class="btn button-entrar" id="entrar">Entrar</button>
                <div class="form-text"> Não tem uma conta?<a href="../cadastro/cadastro.php">Cadastre-se</a></div> 
                </fieldset>
            </form>
        </div>


    </div>

</body>

</html>