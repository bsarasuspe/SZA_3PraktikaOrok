<?php
session_start();
?>
<!DOCTYPE html>
<html>   
	<?php include 'header.php'?>
	<?php include 'dbconfig.php'?>
	<body>

	<?php

	global $zerbitzaria, $erabiltzailea, $gakoa, $db;
	                
	$nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

	if($nireSQLI->connect_error) {
		die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
	}

	$result = $nireSQLI->query("SELECT eposta AS total FROM erabiltzaileak");

	$erabiltzaileKop = $result->num_rows;

	?>
	<?php
			$fitxategia = "xml/liburuak.xml";
            $xml = simplexml_load_file($fitxategia);
            $liburuKop = count($xml->liburua);
    ?>
		<div id="content">
		<div id="column1">
			<?php
			if(isset($_SESSION['kautotua']) && ($_SESSION['kautotua']) == "BAI"){
				echo '<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
				   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
				   <circle cx="12" cy="7" r="4"></circle>
				   <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
				</svg> Erabiltzailea:</b>
				<div id="perfila">
					<div id="perfilekoIrudia"></div>
					<div id="perfilaInfo">'.$_SESSION["izena"].'<br>'.$_SESSION["eposta"].'<br><i>';
				if($_SESSION["mota"] == 0){
					echo 'Erabiltzailea';
				}else{
					echo 'Administratzailea';
				}
					
					echo '</i></div>
					<div style="clear: both"></div>
				</div>';
			}
			?>

			
			<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="10" cy="10" r="7"></circle>
   <line x1="21" y1="21" x2="15" y2="15"></line>
</svg> Bilatu liburuak:</b>
			<form action="bilatu.php" method="get">
			  	<input type="text" name="search" placeholder="Bilatu..">
			</form>

		<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
   <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
   <line x1="3" y1="6" x2="3" y2="19"></line>
   <line x1="12" y1="6" x2="12" y2="19"></line>
   <line x1="21" y1="6" x2="21" y2="19"></line>
</svg> Kategoriak: </b>
	<div id="kategoria"><a href="kategoria.php?kategoria=Komedia">Komedia</a></div>
	<div id="kategoria"><a href="kategoria.php?kategoria=Suspensea">Suspensea</a></div>
	<div id="kategoria"><a href="kategoria.php?kategoria=Fantasia">Fantasia</a></div>
	<div id="kategoria"><a href="kategoria.php?kategoria=Zientzia%20fikzioa">Zientzia fikzioa</a></div>
	<div id="kategoria"><a href="kategoria.php?kategoria=Mexikanoa">Mexikanoa</a></div>
<br>
<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <rect x="3" y="12" width="6" height="8" rx="1"></rect>
   <rect x="9" y="8" width="6" height="12" rx="1"></rect>
   <rect x="15" y="4" width="6" height="16" rx="1"></rect>
   <line x1="4" y1="20" x2="18" y2="20"></line>
</svg> Estadistikak: </b>
		<div id="estadistika">Erabiltzaile erregistratuak: <?php echo "$erabiltzaileKop" ?></div>
		<div id="estadistika">Liburu kopurua: <?php echo "$liburuKop"; ?></div>
		</div>


		<div id="column2">
					<?php
						$aurkitua = false;
					    if(isset($_GET['id'])){
					            $fitxategia = "xml/liburuak.xml";
					            $xml = simplexml_load_file($fitxategia);
					                foreach($xml->liburua as $liburua){
					                    if($liburua["id"]==$_GET['id']){
					                    	$aurkitua = true;
					                    	echo "<div id='liburuaLeft'><div id='liburuaIrudia'><img src='$liburua->irudia'></div>";
					                    	if(isset($_SESSION['kautotua']) && ($_SESSION['kautotua'])){
												$ema = $nireSQLI->query("SELECT * FROM gustoko_liburuak 
													WHERE user_eposta = '$_SESSION[eposta]' AND liburu_id = '$_GET[id]'");
					                    		$gustoko = $ema->num_rows;
					                    		if($gustoko == 0){
					                    			echo "<form id='gustoko' name='gustoko' method='post' action='gehitugustokoliburua.php'>
						                        <input id='eposta' name='eposta' type='hidden' value='$_SESSION[eposta]'>
						                        <input id='id' name='id' type='hidden' value='$_GET[id]'>
						                        <button type='submit' id='ezabatu' class='ezGustokoBotoi'>Gustoko jarri</button>
						                        </form>";
					                    		}else{
					                    			echo "<form id='gustoko' name='gustoko' method='post' action='kendugustokoliburua.php'>
						                        <input id='eposta' name='eposta' type='hidden' value='$_SESSION[eposta]'>
						                        <input id='id' name='id' type='hidden' value='$_GET[id]'>
						                        <button type='submit' id='ezabatu' class='gustokoBotoi'>Gustoko kendu</button>
						                        </form>";
					                    		}
					                    	}

						                    echo "</div>";
						                    echo "<div id='liburuaInfo'>
											<span class='liburuaTitulua'>$liburua->titulua</span><br>
											<p><b>Egilea:</b> $liburua->egilea</p>
											<p><b>Hizkuntza:</b> $liburua->hizkuntza</p>
											<p><b>Kategoria:</b> $liburua->kategoria</p>
											<p><b>Argitaratze data:</b> $liburua->data</p>
											<p><b>Sinopsia:</b> $liburua->sinopsia</p>";
											if(isset($_SESSION['kautotua']) && ($_SESSION['kautotua']) == "BAI"){
												echo "<a href='$liburua->deskarga' target='_blank'><button action='$liburua->deskarga'>Deskargatu liburua</button></a>";
											}else{
												echo "<div id='errorbox'>Liburua deskargatzeko erabiltzaile erregistratua izan behar zara! <a href='register.php'>Erregistratu</a> edo <a href='login.php'>logeatu</a> zaitez.</div>";
											}
											
										echo "</div>";
					                    }
					            }
					            if ($aurkitua == false){
					            	echo '<center><img src="images/liburua.png" width="150"><br><b>Liburua ez da existitzen.</b></center>';
					            }
					        }else{
					        	echo '<center><img src="images/liburua.png" width="150"><br><b>Liburua ez da existitzen.</b></center>';
					        }
					?>
		</div>
	</div>
	<div style="clear: both"></div>
	<?php include 'footer.php'?>
