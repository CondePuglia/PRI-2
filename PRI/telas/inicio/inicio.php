<?php
session_start();
require "../../logic_acess.php";
require "../header.php";

require "../menu.php";

?>

<div class="d-flex flex-column justify-content-center flur" id="inicio">
    <section class="">

        <h1 class="arvo mg3 mx-5 apagar"><span class="arvo fw-bold cp3 data p-2 typed-text"></span><br> <span class="arvo fw-bold cp2 mx-5 immersus cd1c p-2 cursor"></span></h1>

    </section>
    <?php

    if (isset($_SESSION["result"])) {

        if (!$_SESSION["result"]) {
            $erro = $_SESSION["erro"];
          
    ?>

                <p><?php echo $erro; ?></p>
       

    <?php
        }
        unset($_SESSION["erro"]);
        unset($_SESSION["result"]);
    }
    ?>
</div>
<?php
require "../footer.php"
?>