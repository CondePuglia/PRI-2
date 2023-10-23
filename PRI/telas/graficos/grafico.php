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




$nameLocal =  filter_input(INPUT_GET, "nameLocal", FILTER_SANITIZE_SPECIAL_CHARS);

?>
<div class="container d-flex">

    <div class="w-40">

        <?php

        if (!empty($nameLocal)) {
        ?>
            <h3 class="text-center mt-3 mb-5"><?= $nameLocal ?></h3>


            <form id="myForm" action="charts.php" method="post">

                <div class="row d-flex justify-content-start">
                    <div class="form-check form-switch col-2 me-2 raleway fw-bolder fs-5">
                        <input class="form-check-input time" type="checkbox" role="switch" id="temp" name="temp">
                        <label class="form-check-label" for="temp">Temperatura</label>
                    </div>
                    <div class="form-check form-switch col-2 me-2 raleway fw-bolder fs-5">
                        <input class="form-check-input" type="checkbox" role="switch" id="lumi" name="lumi">
                        <label class="form-check-label" for="lumi">Luminosidade</label>
                    </div>
                    <div class="form-check form-switch col-2 raleway fw-bolder fs-5">
                        <input class="form-check-input" type="checkbox" role="switch" id="umi" name="umi">
                        <label class="form-check-label" for="umi">Umidade</label>
                    </div>
                    <div class="row mt-3 d-flex justify-content-start">
                        <h3 class="text-center mb-5">Período</h3>
                        <div class="col-2 raleway fw-bolder fs-5">
                            <input class="form-control" type="date" id="dta-ini" name="dtaini">
                            <label class="form-label" for="umi">Inicial</label>
                        </div>
                        <div class="col-2 raleway fw-bolder fs-5 mb-5">
                            <input class="form-control" type="date" id="dta-fim" name="dtafim">
                            <label class="form-label" for="umi">Final</label>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Gerar</button>
                </div>
    </div>
    <?php
        } else {
?>


<?php
        }
?>

    </form>
</div>
    </div>
<?php
require "../footer.php"

?>
</div>