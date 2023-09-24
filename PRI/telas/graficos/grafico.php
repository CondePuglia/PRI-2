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

var_dump($_SESSION["codusu"]);
var_dump($_SESSION["email"]);
var_dump($_SESSION["nome"]);


?>



<?php

require "../footer.php"

?>