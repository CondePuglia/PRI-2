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


$temp = filter_input(INPUT_POST, 'temp', FILTER_SANITIZE_SPECIAL_CHARS);
$lumi = filter_input(INPUT_POST, 'lumi', FILTER_SANITIZE_SPECIAL_CHARS);
$umi = filter_input(INPUT_POST, 'umi', FILTER_SANITIZE_SPECIAL_CHARS);
$dtaini = filter_input(INPUT_POST, "dtaini", FILTER_SANITIZE_SPECIAL_CHARS);
$dtafim = filter_input(INPUT_POST, "dtafim", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT  a.valortemp, a.valorlumi, a.valorumi
        FROM dados_ambiente a 
        INNER JOIN local l ON a.codsen = l.codsen 
        WHERE DataCaptura BETWEEN ? AND ? ORDER BY datacaptura ASC";

try {
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$dtaini, $dtafim]);


    if ($stmt->rowCount() === 0) {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = "Sem Dados do periodo desejado.";
        header("Location: grafico.php");
    }
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

if ($result == true) {
    $_SESSION["result"] = true;
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
}




$ValorLumiArray = [];

$ValorUmiArray = [];

$ValorTempArray = [];

while ($row = $stmt->fetch()) {
    array_push($ValorTempArray, $row["valortemp"]);
    array_push($ValorLumiArray, $row["valorlumi"]);
    array_push($ValorUmiArray, $row["valorumi"]);
}

$ValorLumiList = implode(",", $ValorLumiArray);
$ValorUmiList = implode(",", $ValorUmiArray);
$ValorTempList = implode(",", $ValorTempArray);
?>
<input type="hidden" id="datatemp" name="datatemp" value="<?= $ValorTempList ?>">
<input type="hidden" id="datalumi" name="datalumi" value="<?= $ValorLumiList ?>">
<input type="hidden" id="dataumi" name="dataumi" value="<?= $ValorUmiList ?>">
<input type="hidden" id="temp" name="temp" value="<?= $temp ?>">
<input type="hidden" id="lumi" name="lumi" value="<?= $lumi ?>">
<input type="hidden" id="umi" name="umi" value="<?= $umi ?>">
<input type="hidden" id="dta-ini" name="dtaini" value="<?= $dtaini ?>">
<input type="hidden" id="dta-fim" name="dtafim" value="<?= $dtafim ?>">

<div class="container cp2 border border-5 border-dark">
    <div class="row">
        <div class="col">
            <h2 class="text-center text-white">Temperatura</h2>
        <div id="gradiente-div-red" class="gradiente-div-red m-5 rounded-4 border border-5 border-danger col-2"></div>
        </div>
        <div class="col">
            <h2 class="text-center text-white">Luminosidade</h2>
        <div id="gradiente-div-green" class="gradiente-div-green m-5 rounded-4 border border-5 border-success col-2"></div>
        </div>
        <div class="col">
            <h2 class="text-center text-white">Umidade</h2>
        <div id="gradiente-div-blue" class="gradiente-div-blue m-5 rounded-4 border border-5 border-primary col-2"></div>
        </div>
    </div>

  
        <div class="legenda d-flex" id="legendaGradual">
           
    
    </div>
</div>
<?php

require "../footer.php"

?>