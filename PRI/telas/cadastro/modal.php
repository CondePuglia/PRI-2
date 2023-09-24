<?php
session_start();

require '../header.php';
if (isset($_SESSION['InsertTrue']) && $_SESSION['InsertTrue'] == true) {
    ob_start();

?>
<script type="text/javascript">
        setTimeout(function () {
            window.location.href = '../../index.php';
        }, 1000); // 5000 milissegundos = 5 segundos
    </script>


<h2>Cadastro Realizado com Sucesso</h2>
<?php
ob_flush();
flush();



} else {
    
    unset($_SESSION['InsertTrue']);
    ob_start();
?>
    <h2>Cadastro Não Realizado</h2>


<?php
 ob_flush();
 flush();


}

?>
</div>
</body>

</html>