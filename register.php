<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
  <?php include 'dbconfig.php'?>
  <script type="text/javascript" src="./js/RegisterValidation.js"></script>

	<body>
		<div id="loginKutxa">
			<div id="loginKutxaTitle"><b>ERREGISTRATU</b></div>
			<form name="form" id="form" action="" method="post" onsubmit="return RegisterValidation()">
  				<div class="container">
  					<br>
  					<label for="izena"><b>Izen abizenak:</b></label>
    				<input type="text" placeholder="Sartu zure izen abizenak" name="izena">
                    <div id="izena-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
   					<label for="eposta"><b>Eposta:</b></label>
    				<input type="email" placeholder="Sartu zure eposta" name="eposta">
                    <div id="eposta-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
    				<label for="pasahitza"><b>Pasahitza:</b></label>
    				<input type="password" placeholder="Sartu zure pasahitza" name="pasahitza">   
    				<label for="pasahitza2"><b>Errepikatu pasahitza:</b></label>
    				<input type="password" placeholder="Errepikatu pasahitza" name="pasahitza2">
                    <div id="pasahitza-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>   
    				<button type="submit">Erregistratu</button>
  				</div>
			</form>
      <?php 
include "dbconfig.php";
$datuak = $_POST;
if (isset($_POST['eposta'])) {
    if(strlen($datuak["eposta"])>0 && strlen($datuak["izena"])>0 && strlen($datuak["pasahitza"])>0 && strlen($datuak["pasahitza2"])>0){
        if(preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $datuak["eposta"])){
            if(strlen($datuak["pasahitza"]) > 8){
                if($datuak["pasahitza"] == $datuak["pasahitza2"]){
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
                    echo "<script> window.location.href = 'index.php';</script>";
                }
            }
        }
    }  
}

?>
<span class="registerlogin-info">Dagoeneko erregistratuta bazaude, logeatu <a href="login.php">hemen</a>.</span>
		</div>
	<?php include 'footer.php'?>