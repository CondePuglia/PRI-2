<div class="">
  <?php
  require "../../conexao.php";
  $sql = "SELECT CodSen, nameLocal FROM local WHERE CodUsu = ?";
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute([$_SESSION['codusu']]);
  $count = $stmt->rowCount();

  if ($count == 0) {
  } else {
  ?>
  <div>
    <h2 class="text-white text-center">Locais</h2>
    <div class="list-group rolagem" style="max-height: 300px; overflow-y: auto;">
      <?php
      while ($row = $stmt->fetch()) {
      ?>
        <a href="grafico.php?codsen=<?= $row["codsen"] ?>" class="list-group-item list-group-item-action cp3"> <span class="arvo"><?= $row["namelocal"] ?></span></a>
      <?php

      }
      ?>
    </div>
    </div>
  <?php


  }
  ?>

  <button type="button" class="btn cp3 arvo p-3 border border-secondary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo Local</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Novo Local</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <form action="../local/local.php" method="post">
            <fieldset class="border border-5 p-5">
              <div>
                <?php
                ?>
                <input type="hidden" value="<?= codusu() ?>" name="codusu">
              </div>
              <div class="mb-3 row">
                <div class="col-5">
                  <label for="nameLocal" class="form-label arvo">Nome do Local:</label>
                </div>
                <div class="col-7 ">
                  <input type="text" class="form-control" id="nameLocal" name="nameLocal">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn cp3 p-2" data-bs-dismiss="modal">Cadastrar</button>
          <button type="reset" class="btn btn-secondary p-2">Limpar</button>
        </div>
        </fieldset>
        </form>
      </div>
    </div>
  </div>