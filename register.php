<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
  <?php include 'dbconfig.php'?>

    <?php
    function balidatu($datuak){
        if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i", $datuak["eposta"])){
            return 'Eposta okerra';
        }
        else if (!preg_match("/^[a-zA-ZÀ-ÿ]{2,}(\s+[a-zA-ZÀ-ÿ]{2,})+$/", $datuak["izena"])){
            return 'Izen abizen okerra';
        }
        else if (strlen($datuak["pasahitza"]) < 8){
            return 'Pasahitz luzera okerra (gutxienez 8 karaktere)';
        }
        else if ($datuak["pasahitza"] != $datuak["pasahitza2"]){
            return 'Bi pasahitzak ez dira berdinak';
        }   
    }
    ?>

	<body>
		<div id="loginKutxa">
			<div id="loginKutxaTitle"><b>ERREGISTRATU</b></div>
			<form action="" method="post">
  				<div class="container">
  					<br>
  					<label for="izena"><b>Izena abizenak:</b></label>
    				<input type="text" placeholder="Sartu zure izen abizenak" name="izena" required>
   					<label for="eposta"><b>Eposta:</b></label>
    				<input type="email" placeholder="Sartu zure eposta" name="eposta" required>
    				<label for="pasahitza"><b>Pasahitza:</b></label>
    				<input type="password" placeholder="Sartu zure pasahitza" name="pasahitza" required>   
    				<label for="pasahitza2"><b>Errepikatu pasahitza:</b></label>
    				<input type="password" placeholder="Errepikatu pasahitza" name="pasahitza2" required>   
    				<button type="submit">Erregistratu</button>
  				</div>
			</form>
      <?php
include "DbConfig.php";
if (isset($_POST['eposta'])) {
    if (($arazoa = balidatu($_POST)) != ''){
        echo "<script> alert('$arazoa')</script>";
        return;
    }

    global $zerbitzaria, $erabiltzailea, $gakoa, $db;
    $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

    if($nireSQLI->connect_error) {
        echo "<script> alert('DB-ra konexio bat egitean errore bat egon da. Berriro saiatu.')";
        return;
    }

    $sqlInsertQuestion = "INSERT INTO erabiltzaileak(eposta, izena, pasahitza, mota) 
                            VALUES ('$_POST[eposta]', '$_POST[izena]', '$_POST[pasahitza]', '0')";

    if (!$nireSQLI->query($sqlInsertQuestion)) {
        $mezua = str_replace("'", "\'", $nireSQLI->error);
        echo "<script>alert('Errorea datu-basean: $mezua')</script>";
        return;
    }
    header("location: index.php");
}
?>
		</div>
	<?php include 'footer.php'?>