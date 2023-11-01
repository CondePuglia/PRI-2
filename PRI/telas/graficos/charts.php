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


$dtaini = filter_input(INPUT_POST, "dtaini",);
$dtafim = filter_input(INPUT_POST, "dtafim",);


$temp = filter_input(INPUT_POST, "temp");
$lumi = filter_input(INPUT_POST, "lumi");
$umi = filter_input(INPUT_POST, "umi");


$sql = "SELECT  a.valortemp, a.valorlumi, a.valorumi
        FROM dados_ambiente a 
        INNER JOIN local l ON a.codsen = l.codsen 
        WHERE DataCaptura BETWEEN ? AND ? ORDER BY datacaptura ASC";
$stmt = $conn->prepare($sql);
$stmt->execute([$dtaini,$dtafim ]);

$ValorLumiArray = [];

$ValorUmiArray = [];

$ValorTempArray = [];

while($row = $stmt->fetch()){
    array_push($ValorTempArray, $row["valortemp"]);
    array_push($ValorLumiArray, $row["valorlumi"]);
    array_push($ValorUmiArray, $row["valorumi"]);   
}

$ValorLumiList = implode(",", $ValorLumiArray);
$ValorUmiList = implode(",", $ValorUmiArray);
$ValorTempList = implode(",", $ValorTempArray);
?>

<input type="hidden" id="datatemp" value="<?= $ValorTempList ?>">
<input type="hidden" id="datalumi" value="<?= $ValorLumiList ?>">
<input type="hidden" id="dataumi" value="<?= $ValorUmiList ?>">
<input type="hidden" id="temp" name="temp" value="<?= $temp ?>">
<input type="hidden" id="lumi" name="lumi" value="<?= $lumi ?>">
<input type="hidden" id="umi" name="umi" value="<?= $umi ?>">
<input type="hidden" id="dta-ini" name="dtaini" value="<?= $dtaini ?>">
<input type="hidden" id="dta-fim" name="dtafim" value="<?= $dtafim ?>">

<div class="container d-flex">


    <div class="w-100">
        <div class="row w-33">

            <canvas id="tempChart" style=" height: 30vh;"></canvas>
        </div>
        <div class="row w-33">

            <canvas id="lumiChart" style="height: 30vh;"></canvas>
        </div>
        <div class="row w-33">

            <canvas id="umiChart" style="height: 30vh;"></canvas>
        </div>


    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="js/charts.js"></script>
<?php
require "../footer.php"

?>