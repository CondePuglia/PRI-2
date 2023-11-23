<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Document</title>
    
</head>
<body>
    

<div id="resultContainer">
    <?php
    require '../../../conexao.php';

   

    $codsenselecionado = json_encode($_SESSION['localSelecionado']);

    

?>

<script>
    window.codsenselecionado = <?php echo $codsenselecionado; ?>;

</script>
<?php
 $receivedUmi = $_POST['Umi'];
 $receivedLumi = $_POST['Lumi'];
 $receivedTemp = $_POST['Temp'];

 
 if (isset($_POST['Umi']) && isset($_POST['Lumi']) && isset($_POST['Temp']) && isset($_POST['Date'])) {
    $receivedUmi = $_POST['Umi'];
    $receivedLumi = $_POST['Lumi'];
    $receivedTemp = $_POST['Temp'];
    $receivedDate = $_POST['Date'];
    $CodSen = $_SESSION['localSelecionado'];
        echo 'Received Umi in PHP: ' . $receivedUmi . '<br>';
        echo 'Received Lumi in PHP: ' . $receivedLumi . '<br>';
        echo 'Received Temp in PHP: ' . $receivedTemp;
    
      $sql = "INSERT INTO dados_ambiente ( codsen, valorlumi, valorumi, valortemp, datacaptura) VALUES ( ?, ?, ?, ?, ?)";

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$CodSen, $receivedLumi, $receivedUmi, $receivedTemp,$receivedDate]);
        } catch (Exception $e) {
            $result = false;
            $error = $e->getMessage();
        }
        

    } 
    ?>
</div>
<script type="module"  src="script_fire.js"></script>
</body>
</html>