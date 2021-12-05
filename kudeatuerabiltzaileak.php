<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
  <?php include 'dbconfig.php';?>
	<body>
		<div id="content">
			<div id="liburuaGehituContainer">
                        <?php
        if(isset($_GET["editatu"])){
          echo "<div id='success-alert'>Erabiltzailea ongi editatu da</div>";
        }
        if(isset($_GET["ezabatu"])){
          echo "<div id='success-alert'>Erabiltzailea ongi ezabatu da</div>";
        }
      ?>
				<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
   <line x1="13" y1="8" x2="15" y2="8"></line>
   <line x1="13" y1="12" x2="15" y2="12"></line>
</svg> Kudeatu erabiltzaileak:</b>

                        <?php

                        global $zerbitzaria, $erabiltzailea, $gakoa, $db;
                        $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

                        if($nireSQLI->connect_error) {
                            die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
                        }

                        $ema = $nireSQLI->query("SELECT eposta, izena FROM erabiltzaileak");

                        for ($x = 0; $x < $ema->num_rows; $x++){
                            $ema->data_seek($x);
                            $datuak = $ema->fetch_assoc();
                            echo "<div id='liburuLista'><b>$datuak[izena]</b> - $datuak[eposta]
                                
                        <div id='ezabatuLinka'><form id='borratu' name='borratu' method='post' action='editatuerabiltzailea.php'>
                        <input id='eposta' name='eposta' type='hidden' value='$datuak[eposta]'>
                        <button type='submit' id='ezabatu' class='ezabatuButton'>Ezabatu</button>
                        </form></div>
                        <div id='ezabatuLinka'><form id='borratu' name='borratu' method='get' action='editatuerabiltzailea.php'>
                        <input id='eposta' name='eposta' type='hidden' value='$datuak[eposta]'>
                        <button type='submit' id='ezabatu' class='ezabatuButton'>Editatu</button>
                        </form></div>
                                </div>";
                        }?>

				</div>
			</div>
		</div>
	<?php include 'footer.php'?>
