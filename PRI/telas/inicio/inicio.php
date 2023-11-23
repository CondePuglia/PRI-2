<?php
session_start();
require "../../logic_acess.php";
require "../header.php";

require "../menu.php";

?>
 
<div class="d-flex flex-column justify-content-center flur" id="inicio">
<div class="row ">
  <div class="col-4 offset-4">
    <?php
    if (isset($_SESSION["result_login"])) {

      if (!$_SESSION["result_login"]) {
    

        $erro = $_SESSION["erro"];
        unset($_SESSION["erro"]);


      ?>

        <div class="cp1 p-5 men">

          <h4 class="arvo fs-1 fw-bold text-danger">Falha ao efetuar autenticação</h4>
          <hr>
          <p class="raleway fw-bold text-danger fs-3"><?php echo $erro; ?></p>
        </div>

    <?php

      }
      unset($_SESSION["result_login"]);
    }
    ?>
  </div>
</div>
    <section class="">

        <h1 class="arvo mg3 mx-5 apagar"><span class="arvo fw-bold cp3 data p-2 typed-text"></span><br> <span class="arvo fw-bold cp2 mx-5 immersus cd1c p-2 cursor"></span></h1>

    </section>
   
</div>
<?php
require "../footer.php"
?>