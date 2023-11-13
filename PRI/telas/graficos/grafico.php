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
require "../../conexao.php";



$nameLocal =  filter_input(INPUT_GET, "nameLocal", FILTER_SANITIZE_SPECIAL_CHARS);


?>
<div class="d-flex ms-5 me-5 border cp2 rounded flex-sm-grow-1">

    <div class="m-5 p-2">

        <?php

        if (!empty($nameLocal)) {
        ?>
            <h3 class="text-center mt-3 mb-5 fw-bolder fs-1 cp3">Local: <span class="fw-bold fs-2"><?= $nameLocal ?></span></h3>


            <form id="form-graph" action="charts.php" method="post">

                <input type="hidden" name="local" id="local" value="<?= $nameLocal ?>">
                <div class="d-flex flex-column mb-3">
                    <div class="row form-check form-switch  me-2 arvo fw-bolder fs-5 offset-1">
                        <input class="form-check-input fs-3" type="checkbox" role="switch" id="temp" name="temp">
                        <label class="form-check-label text-white fs-4" for="temp">Temperatura</label>
                    </div>
                    <div class="row form-check form-switch  me-2 arvo fw-bolder fs-5 offset-1">
                        <input class="form-check-input fs-3" type="checkbox" role="switch" id="lumi" name="lumi">
                        <label class="form-check-label text-white fs-4" for="lumi">Luminosidade</label>

                    </div>
                    <div class="row form-check form-switch me-2 arvo fw-bolder fs-5 offset-1">
                        <input class="form-check-input fs-3" type="checkbox" role="switch" id="umi" name="umi">
                        <label class="form-check-label text-white fs-4" for="umi">Umidade</label>
                    </div>
                </div>
                <div class="alert alert-danger hidden" role="alert" id="errorinputdiv">
                    <p class="error-messageinput"></p>
                </div>


                <div class="row mt-3 d-flex justify-content-start">
                    <h3 class="text-center mb-5  fw-bold cp3">Período</h3>
                    <div class="col-6 raleway fw-bolder fs-5">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label text-white fs-3" for="dta-ini">Data Inicial: </label>
                            </div>
                            <div class="col-8">
                                <input class="form-control fw-bold" type="date" id="dta-ini" name="dtaini">
                            </div>
                        </div>
                        <br>
                        <span class="error-messagedateini hidden fw-bold text-danger border border-danger p-2"></span>
                    </div>
                    <div class="col-6 raleway fw-bolder fs-5 mb-5">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label text-white fs-3" for="dta-fim">Data Final</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control fw-bold" type="date" id="dta-fim" name="dtafim">
                            </div>
                        </div>
                        <br>
                        <span class="error-messagedatefim hidden text-danger fw-bold border border-danger p-2"></span>

                    </div>
                    <div class="alert alert-danger hidden" role="alert" id="errordiasdiv">
                        <p class="error-messagedias"></p>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn cp3 cdc1 fs-3" id="submit">Gerar</button>

                </div>
    </div>

    <?php

if (isset($_SESSION["result"])) {

    if (!$_SESSION["result"]) {
        $erro = $_SESSION["erro"];
        unset($_SESSION["erro"]);
?>

            <p><?php echo $erro; ?></p>
   

<?php
    }

    unset($_SESSION["result"]);
}
?>



</div>
<?php
        } else {
?>

    <div class="alert alert-warning p-5" style="height: 62vh;" role="alert">
        <h4 class="alert-heading fs-1 p-2">Atenção</h4>
        <p class="fs-1 p-3"><strong>Nenhum Local Selecionado</strong></p>
        <p class="fs-4 ">Após selecionar um local, é necessário <b>informar</b> pelo menos um gráfico que deseja formar e um período de tempo <b>válido</b> que deseja ver as informações.</p>
        <span class="fs-5 alert-heading mt-5 fw-bold">Períodos acima de 60 dias não são suportados</span>

    </div>

<?php
        }
?>

</form>

</div>
</div>
<script src="js/ajax.js"></script>
<?php
require "../footer.php"

?>
</div>