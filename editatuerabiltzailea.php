<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
  <?php include 'dbconfig.php';?>
      <?php
      if(isset($_SESSION["kautotua"])){
                if (($_SESSION["kautotua"] != "BAI") || ($_SESSION["mota"] != 1)) {
            echo "<script> window.location.href = 'index.php';</script>";
            exit();
        }
      }else{
        echo "<script> window.location.href = 'index.php';</script>";
      }
    ?>
	<body>
		<div id="content">
			<div id="liburuaGehituContainer">
				<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
   <line x1="13" y1="8" x2="15" y2="8"></line>
   <line x1="13" y1="12" x2="15" y2="12"></line>
</svg> Kudeatu erabiltzailea:</b>

                        <?php

                        if (isset($_GET["eposta"])){
                          global $zerbitzaria, $erabiltzailea, $gakoa, $db;
                        $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

                        if($nireSQLI->connect_error) {
                            die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
                        }

                        $ema = $nireSQLI->query("SELECT eposta, izena, pasahitza, mota FROM erabiltzaileak WHERE eposta='$_GET[eposta]'");

                        for ($x = 0; $x < $ema->num_rows; $x++){
                            $ema->data_seek($x);
                            $datuak = $ema->fetch_assoc();
                            echo '      <form name="form" id="form" action="" method="post" onsubmit="return RegisterValidation()">
          <div class="container">
            <br>
            <label for="izena"><b>Izen abizenak:</b></label>
            <input type="text" placeholder="Sartu zure izen abizenak" name="izena" value="'.$datuak["izena"].'">
                    <div id="izena-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
            <label for="eposta"><b>Eposta:</b></label>
            <input type="email" placeholder="Sartu zure eposta" name="eposta" value="'.$datuak["eposta"].'">
                    <div id="eposta-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
            <label for="pasahitza"><b>Pasahitza:</b></label>
            <input type="text" placeholder="Sartu zure pasahitza" name="pasahitza" value="'.$datuak["pasahitza"].'">   
            <label for="mota"><b>Mota:</b></label>
            <select name="mota">
              <option'; if($datuak["mota"] == '0') echo ' selected'; echo ' value="0">Erabiltzailea</option>
              <option'; if($datuak["mota"] == '1') echo ' selected'; echo ' value="1">Administratzailea</option>
            </select>  
                    <div id="pasahitza-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>   
            <button type="submit">Gorde</button>
          </div>
      </form>';
                        }
                      }else{
                        echo "<script> window.location.href = 'kudeatuerabiltzaileak.php';</script>";                
                      }?>



				</div>
			</div>
		</div>
	<?php include 'footer.php'?>

<?php
        if (isset($_POST['izena'])){
          $ema = $nireSQLI->query("UPDATE erabiltzaileak SET izena='$_POST[izena]', eposta='$_POST[eposta]', pasahitza='$_POST[pasahitza]', mota='$_POST[mota]' WHERE eposta='$_GET[eposta]'");
          echo "<script> window.location.href = 'kudeatuerabiltzaileak.php?editatu=true';</script>";                            
        }
    ?>