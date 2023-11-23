<?php
session_start();
require "../../logic_acess.php";
require "../header.php";
require "../menu.php";


?>
<div class="div-central">

<div class="d-flex flex-column">
  <div class="row featurette">
    <p class="mg4 ms-5"> O que são dados?</p><br>
    <div class="col-md-7 order-md-2">

      <h2 class="featurette-heading mg3 mb-2"><span class="text-muted ">A princípio, um dado numérico é apenas um valor.</span></h2>
      <p class="lead fs-4">Em suma, um dado é apenas um valor, contudo quando uma massa deles são inseridos de forma organizada e tratadas em um sistema computacional, uma realidade pode ser observada através deles. Para a representação dessa realidade, as informações devem ser relacionadas e armazenadas para estarem propícias à exibição.</p>
    </div>
    <div class="col-md-5 order-md-1">
    <div>

  <img src="img/Simple_Magic_Cube.svg.png" alt="" class="img me-3">
</div> 
    </div>
  </div>

 

</div>



<div>
  <div class="row featurette">
    <div class="col-md-7 order-md-1">
      <h2 class="featurette-heading mg3 ms-4"> <br><span class="text-muted">A constante mudança de fatores climáticos</span></h2>
      <p class="lead mm3">...como umidade, temperatura e luminosidade normalmente não é notada pelo usuário e pode afetar a saúde dos indivíduos, como causar sintomas de exaustão. Além disso, essa mudança pode interferir no ambiente no qual ele habita, inclusive podendo impactar na perda de plantações, por exemplo. </p>
    </div>
    <div class="col-md-5 order-md-2">
    <div>

<img src="img/mudança.svg" alt="" class="img me-3 rounded">
</div>
    </div>
  </div>

</div>
</div>
<?php

require "../footer.php";
?>