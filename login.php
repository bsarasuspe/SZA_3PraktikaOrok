<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
	<?php include 'dbconfig.php'?>
	<body>
	<?php
        if (isset($_SESSION["kautotua"]) && $_SESSION["kautotua"] == "BAI") {
            echo "<script> window.location.href = 'index.php';</script>";
            exit();
        }
    ?>
    <div id="content">
		<div id="loginKutxa">
			<div id="loginKutxaTitle"><b>LOGEATU</b></div>
			<form action="" method="post">
  				<div class="container">
   					<label for="eposta"><b>Eposta:</b></label>
    				<input type="email" placeholder="Sartu zure eposta" name="eposta" required>
    				<label for="pasahitza"><b>Pasahitza:</b></label>
    				<input type="password" placeholder="Sartu zure pasahitza" name="pasahitza" required>    
    				<button type="submit">Logeatu</button>
  				</div>
			</form>
			<?php
            
            if (!empty($_POST)){
                $datuak = $_POST;
                global $zerbitzaria, $erabiltzailea, $gakoa, $db;
                
                $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

                if($nireSQLI->connect_error) {
                    die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
                }

                $ema = $nireSQLI->query("SELECT eposta, izena, pasahitza, mota FROM erabiltzaileak WHERE eposta = '".$_POST["eposta"]."'");

                if (($tabladatuak = $ema->fetch_row()) != null) {
                    if ($datuak["eposta"] == $tabladatuak[0] && $datuak["pasahitza"]==$tabladatuak[2]) {
                        $_SESSION["kautotua"]= "BAI";
                        $_SESSION["eposta"] = $tabladatuak[0];
                        $_SESSION["izena"] = $tabladatuak[1];
                        $_SESSION["mota"] = $tabladatuak[3];
                        echo "<script> window.location.href = 'index.php';</script>";
                    } else {
                        echo '<div id="errorbox"> Zure erabiltzailea edo pasahitza ez dira zuzenak. </div>';
                    }
                } else {
                    echo '<div id="errorbox"> Erabiltzailea ez da existitzen.</div>';
                }

            }
            ?>
		</div>
    </div>
	<?php include 'footer.php'?>
