<?php
session_start();
require "../../logic_acess.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}
$dtaini = filter_input(INPUT_POST, "dtaini", FILTER_SANITIZE_SPECIAL_CHARS);
$dtafim = filter_input(INPUT_POST, "dtafim", FILTER_SANITIZE_SPECIAL_CHARS);

function calcularDiferencaEValidar($dtaini, $dtafim)
{
    if (isset($dtaini) && isset($dtafim) && strtotime($dtaini) !== false && strtotime($dtafim) !== false) {
        $dataInicio = new DateTime($dtaini);
        $dataFim = new DateTime($dtafim);
        $diferenca = $dataInicio->diff($dataFim);

        if ($diferenca->days > 60) {

            header("Location: grafico.php");
            exit;
        }
    } else {
        die();
    }
}
calcularDiferencaEValidar($dtaini, $dtafim);
require "../header.php";

require "../../conexao.php";

$local = filter_input(INPUT_POST, "local", FILTER_SANITIZE_SPECIAL_CHARS);

$temp = filter_input(INPUT_POST, "temp", FILTER_SANITIZE_SPECIAL_CHARS);
$lumi = filter_input(INPUT_POST, "lumi", FILTER_SANITIZE_SPECIAL_CHARS);
$umi = filter_input(INPUT_POST, "umi", FILTER_SANITIZE_SPECIAL_CHARS);
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




if ($temp == "on") {
    $escondertemp = "";
} else {
    $escondertemp = "hidden";
}

if ($lumi == "on") {
    $esconderlumi = "";
} else {
    $esconderlumi = "hidden";
}

if ($umi == "on") {
    $esconderumi = "";
} else {
    $esconderumi = "hidden";
}

$alturaGraficostemp = $temp == "on" ? '80vh' : '0vh';
$alturaGraficoslumi = $lumi == "on" ? '80vh' : '0vh';
$alturaGraficosumi = $umi == "on" ? '80vh' : '0vh';

if ($temp == "on" && $lumi == "on" && $umi == "on") {
    $alturaGraficostemp = '30vh';
    $alturaGraficoslumi = '30vh';
    $alturaGraficosumi = '30vh';
} elseif ($temp == "on" && $lumi == "on") {
    $alturaGraficostemp = '50vh';
    $alturaGraficoslumi = '50vh';
    $alturaGraficosumi = '0vh';
} elseif ($temp == "on" && $umi == "on") {
    $alturaGraficostemp = '50vh';
    $alturaGraficosumi = '50vh';
    $alturaGraficoslumi = '0vh';
} elseif ($lumi == "on" && $umi == "on") {
    $alturaGraficoslumi = '50vh';
    $alturaGraficosumi = '50vh';
    $alturaGraficostemp = '0vh';
}

require "../menu.php";
require "../sidebar.php";


?>


<div class="container d-flex flex-column">

<div class="cp2 rounded-1 p-2">
    <h1 class="text-center fs-1  text-white mt-2 raleway fw-bold p-1 ">DADOS AMBIENTAIS EM <?= $local ?></h1>
    <form action="../RGB/escala.php" method="post" class="d-flex flex-row-reverse align-self-center">
        <input type="hidden" id="datatemp" name="datatemp" value="<?= $ValorTempList ?>">
        <input type="hidden" id="datalumi" name="datalumi" value="<?= $ValorLumiList ?>">
        <input type="hidden" id="dataumi" name="dataumi" value="<?= $ValorUmiList ?>">
        <input type="hidden" id="temp" name="temp" value="<?= $temp ?>">
        <input type="hidden" id="lumi" name="lumi" value="<?= $lumi ?>">
        <input type="hidden" id="umi" name="umi" value="<?= $umi ?>">
        <input type="hidden" id="dta-ini" name="dtaini" value="<?= $dtaini ?>">
        <input type="hidden" id="dta-fim" name="dtafim" value="<?= $dtafim ?>">

        <button type="submit" class="btn cp1 arvo fs-5 me-5">Relacionar com Cores</button>
    </form>
    </div>
    <div class="w-100 mt-1">
        <h2 class="bg-danger arvo p-2 rounded-4 <?= $escondertemp; ?>">TEMPERATURA</h2>
        <div class="row">

            <canvas id="tempChart" style="height: <?= $alturaGraficostemp; ?>;"></canvas>
        </div>
        <h2 class="bg-warning lumi arvo p-2 rounded-4 <?= $esconderlumi; ?>">LUMINOSIDADE</h2>
        <div class="row">

            <canvas id="lumiChart" style="height: <?= $alturaGraficoslumi; ?>;"></canvas>
        </div>
        <h2 class="bg-info arvo p-2 rounded-4 <?= $esconderumi; ?>">UMIDADE</h2>
        <div class="row">

            <canvas id="umiChart" style="height: <?= $alturaGraficosumi; ?>;"></canvas>
        </div>


    </div>
</div>




</div>
<div class="cd1">
    <footer class="py-3">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="../inicio/inicio.php" class="nav-link px-2  text-white">Inicio</a></li>
            <li class="nav-item"><a href="../data/data.php" class="nav-link px-2 text-white" translate="no">Data</a></li>
            <li class="nav-item"><a href="../imer/immersus.php" class="nav-link px-2 text-white" translate="no">Immersus</a></li>
            <li class="nav-item"><a href="../sobre/projeto.php" class="nav-link px-2 text-white">Sobre</a></li>
        </ul>
        <p class="text-center text-white">© 2023 DATA IMMERSUS - Soares,Rafael & Puglia Conde,Ricardo</p>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../script_global.js"></script>
<script src="js/charts.js"></script>


</body>

</html>