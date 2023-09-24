<div class="d-flex flex-row">
  <div class="d-flex flex-column flex-shrink-0 p-3 cp2 maior" style="width: 280px;">
    <a href="../../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4 arvo">Data Immersus</span>
    </a>
    <hr>
    <?php

    $Graficos = "<a href='../graficos/grafico.php' class='nav-link text-white raleway'>Graficos</a> <br>";
    $Escalas = "<a href='../RGB/escala.php' class='nav-link text-white raleway'>Escalas</a> <br>";


    $path = $_SERVER['REQUEST_URI'];

    if (strpos($path, "grafico.php") !== false) {
      $ex2 = "<a href='../graficos/grafico.php' class='nav-link text-white raleway active'>Graficos</a>";
    } elseif (strpos($path, "escala.php") !== false) {
      $ex3 = "<a href='../RGB/escala.php' class='nav-link text-white raleway active'>Escalas</a>";
    }
    ?>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <?= $Graficos ?>
      </li>
      <li>
        <?= $Escalas ?>
      </li>
    </ul>
    <hr>

    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"><?= nome_usuario(); ?></font>
          </font>
        </strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Configuração Locais</font>
            </font>
          </a></li>
        <li><a class="dropdown-item" href="../perfil/perfil.php">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Perfil</font>
            </font>
          </a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../perfil/excluir-usuario.php">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Excluir Conta</font>
            </font>
          </a></li>
      </ul>
    </div>
  </div>