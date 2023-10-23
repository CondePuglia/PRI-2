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


$dtaini = filter_input(INPUT_POST, "dtaini", FILTER_VALIDATE_REGEXP, array(
    "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
));
$dtafim = filter_input(INPUT_POST, "dtafim", FILTER_VALIDATE_REGEXP, array(
    "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
));

$temp = filter_input(INPUT_POST,"temp");
$lumi = filter_input(INPUT_POST,"lumi");
$umi = filter_input(INPUT_POST,"umi");

$selectedTemp = isset($temp) ? true : false;
$selectedUmi = isset($lumi) ? true : false;
$selectedLumi = isset($umi) ? true : false;
$dtaini = $_POST['dtaini'];
$dtafim = $_POST['dtafim'];
?>
<div class="container d-flex">

    <div class="w-100">
        <div class="row w-33">

            <canvas id="tempChart" style=" height: 30vh;"></canvas>
        </div>
        <div class="row w-33">

            <canvas id="umiChart" style="height: 30vh;"></canvas>
        </div>
        <div class="row w-33">

            <canvas id="lumiChart" style="height: 30vh;"></canvas>
        </div>


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
require "../footer.php"

?>