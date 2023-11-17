<?php
?>
<div class="d-flex flex-row cp1" id="corgraph">
  <div class="d-flex flex-column flex-shrink-0 p-3 cp2" style="width: 280px; min-height: 100vh;">
    <a href="../../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-2 arvo cp3c" translate="no">Data Immersus</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto mx-3">
      <li>
        <a href='../graficos/grafico.php' class='nav-link text-white raleway my-3 fw-bolder fs-4'>Graficos <svg class="m-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg></a>
      </li>
      <li>
        <a href='../RGB/escala.php' class='nav-link text-white raleway fw-bolder fs-4'>Escalas <svg class="m-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
            <line x1="18" y1="20" x2="18" y2="10"></line>
            <line x1="12" y1="20" x2="12" y2="4"></line>
            <line x1="6" y1="20" x2="6" y2="14"></line>
          </svg></a>
      </li>
    </ul>


    <?php
    require "../local/sidebar_local.php";
    ?>
    <hr>
    
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle fs-1" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>
          <font style="vertical-align: inherit;">
            <?php


            function usuario()
            {
              $nome = nome_usuario();
              // Dividir o nome em palavras
              $palavras = explode(' ', $nome);

              // Imprimir cada palavra separada por <br>
              foreach ($palavras as $palavra) {
                echo $palavra . "<br>";
              }
            }

            ?>
            <font style="vertical-align: inherit;"><?= usuario(); ?></font>
          </font>
        </strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow  p-4">
        <li><a class="dropdown-item fs-4" href="../perfil/perfil.php">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Perfil <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg></font>
            </font>
          </a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="text-danger"><a class="dropdown-item text-danger fs-4" role="alert" href="../perfil/excluir-usuario.php" onclick="if(!confirm('Tem certeza que deseja SI excluir?')) return false;">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;"> Excluir Conta <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="8.5" cy="7" r="4"></circle>
                  <line x1="18" y1="8" x2="23" y2="13"></line>
                  <line x1="23" y1="8" x2="18" y2="13"></line>
                </svg></font>
            </font>
          </a></li>
      </ul>
    </div>
  </div>
</div>
  
