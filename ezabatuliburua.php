<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
	<body>
		<div id="content">
			<div id="liburuaGehituContainer">
				<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
   <line x1="13" y1="8" x2="15" y2="8"></line>
   <line x1="13" y1="12" x2="15" y2="12"></line>
</svg> Ezabatu liburua:</b>

                <?php
                $aurkitua = false;
                      $fitxategia = "xml/liburuak.xml";
                      $xml = simplexml_load_file($fitxategia);
                          foreach($xml->liburua as $liburua){
                                $aurkitua = true;
                                echo "<div id='liburuLista'>$liburua->titulua
                                <div id='ezabatuLinka'>Ezabatu</div>
                                </div>";
                      }
                      if ($aurkitua == false){
                        echo '<center><img src="images/liburua.png" width="150"><br><b>Ez dago libururik.</b></center>';
                      }
                ?>
				</div>
			</div>
		</div>
	<?php include 'footer.php'?>
