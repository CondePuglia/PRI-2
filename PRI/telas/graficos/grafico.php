<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
require "../header.php";
require "../menu.php";
require "../sidebar.php";

?>

<div class="flex-grow-1 bg-body">
    <p class="text-danger">A SER IMPLANTADA</p>
</div>

<?php

require "../footer.php"

?>