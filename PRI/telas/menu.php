<header class="p-3 cd1">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="../inicio/inicio.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="../logo.png" alt="Logo" width="50" height="50" class=" mx-2">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../inicio/inicio.php" class="nav-link px-2 text-white fs-5 apagar mx-2 arvo fw-medium">Inicio</a></li>
                <li><a href="../Data/Data.php" class="nav-link px-2  apagar fs-5  mx-2 arvo fw-medium menuD" translate="no">Data</a></li>
                <li><a href="../imer/immersus.php" class="nav-link px-2 apagar fs-5  mx-2 arvo fw-medium menuI" translate="no">Immersus</a></li>
                <?php

                if (autenticado()) {
                ?>
                    <li><a href="../graficos/grafico.php" class="nav-link px-2 apagar fs-5 fw-medium menuG">Graficos</a></li>
                <?php
                }
                ?>
            </ul>

            <?php
            if (!autenticado()) {
            ?>
                <div class="text-end">
                    <a href="../login/form-login.php" class="mx-2">
                        <button type="button" class="btn btn-outline-secondary relaway fw-normal">Entrar <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg></button>
                    </a>

                    <a href="../cadastro/cadastro.php"><button type="button" class="btn btn-outline-secondary relaway fw-normal">Cadastrar <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg></button></a>
                </div>
            <?php
            } else {
            ?>
                <span class="navbar-text">

                    <a href="../perfil/perfil.php"><span class="fs-4 mx-2 text-warning">Bem Vindo, <?= nome_usuario(); ?></span></a>
                </span>
                <a href="../sair.php" class="mx-2">
                    <button type="button" class="btn btn-outline-danger relaway fw-normal">Sair <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg></button>
                </a>
            <?php
            }

            ?>
        </div>
    </div>

</header>