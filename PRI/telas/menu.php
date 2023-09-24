<header class="p-3 cd1">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../inicio/inicio.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="../Logo_marrom_claro.png" alt="Seu Logo" width="40" height="32">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../inicio/inicio.php" class="nav-link px-2 text-white fs-5 apagar">Inicio</a></li>
                <li><a href="../Data/Data.php" class="nav-link px-2 text-white apagar fs-5">Data</a></li>
                <li><a href="#" class="nav-link px-2 text-white apagar fs-5">Immersuss</a></li>
                <?php
                if (autenticado()) {
                ?>
                <li><a href="../graficos/grafico.php" class="nav-link px-2 text-white apagar fs-5">Graficos</a></li>
                <?php
                }
                ?>
            </ul>

            <?php
            if (!autenticado()) {
            ?>
                <div class="text-end">
                    <a href="../login/form-login.php" class="mx-2"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="../cadastro/cadastro.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>
            <?php
            } else {
            ?>
                <span class="navbar-text">
                    <span data-feather="user"></span>
                    <span class="fs-4 mx-2"><?= nome_usuario(); ?></span>
                </span>
                <a href="../sair.php" class="btn btn-danger me-2">
                    <span data-feather="log-out"></span>
                    Sair
                </a>
            <?php
            }
            ?>
        </div>
    </div>

</header>