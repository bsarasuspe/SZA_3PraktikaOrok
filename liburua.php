<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
	<body>
		<div id="content">
			<div id="liburuOrriaContainer">
					<?php
						$aurkitua = false;
					    if(isset($_GET['id'])){
					            $fitxategia = "xml/liburuak.xml";
					            $xml = simplexml_load_file($fitxategia);
					                foreach($xml->liburua as $liburua){
					                    if($liburua["id"]==$_GET['id']){
					                    	$aurkitua = true;
					                    	echo "<div id='liburuaIrudia'><img src='$liburua->irudia'></div>
					                    	<div id='liburuaInfo'>
											<span class='liburuaTitulua'>$liburua->titulua</span><br>
											<p><b>Egilea:</b> $liburua->egilea</p>
											<p><b>Hizkuntza:</b> $liburua->hizkuntza</p>
											<p><b>Kategoria:</b> $liburua->kategoria</p>
											<p><b>Argitaratze data:</b> $liburua->data</p>
											<p><b>Sinopsia:</b> $liburua->sinopsia</p>
											<button type=''>Deskargatu liburua</button>
										</div>";
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
	<?php include 'footer.php'?>
