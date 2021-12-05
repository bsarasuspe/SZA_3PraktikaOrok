<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
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
</svg> Editatu liburua:</b>

                    <?php
                        $aurkitua = false;
                        if(isset($_GET['id'])){
                                $fitxategia = "xml/liburuak.xml";
                                $xml = simplexml_load_file($fitxategia);
                                    foreach($xml->liburua as $liburua){
                                        if($liburua["id"]==$_GET['id']){
                                            $aurkitua = true;
                                            echo '
                                            <form action="" method="post">
                                            <div class="container">
                                                <br>
                                                <label for="titulua"><b>Titulua:</b></label>
                                                <input type="text" placeholder="Sartu liburuaren titulua" name="titulua" value="'.$liburua->titulua.'" required>
                                        <label for="egilea"><b>Egilea:</b></label>
                                        <input type="text" placeholder="Sartu liburuaren egilea" name="egilea" value="'.$liburua->egilea.'" required>
                                                <label for="hizkuntza"><b>Hizkuntza:</b></label>
                                                <select name="hizkuntza">
                                                    <option'; if($liburua->hizkuntza == 'Euskera') echo ' selected'; echo '>Euskara</option>
                                                    <option'; if($liburua->hizkuntza == 'Gaztelera') echo ' selected'; echo '>Gaztelera</option>
                                                    <option'; if($liburua->hizkuntza == 'Ingelesa') echo ' selected'; echo '>Ingelesa</option>
                                                </select>  
                                                <label for="kategoria"><b>Kategoria:</b></label>
                                                <select name="kategoria">
                                                    <option'; if($liburua->kategoria == 'Komedia') echo ' selected'; echo '>Komedia</option>
                                                    <option'; if($liburua->kategoria == 'Suspensea') echo ' selected'; echo '>Suspensea</option>
                                                    <option'; if($liburua->kategoria == 'Fantasia') echo ' selected'; echo '>Fantasia</option>
                                                    <option'; if($liburua->kategoria == 'Zientzia fikzioa') echo ' selected'; echo '>Zientzia fikzioa</option>
                                                    <option'; if($liburua->kategoria == 'Mexikanoa') echo ' selected'; echo '>Mexikanoa</option>
                                                </select>  
                                                <label for="data"><b>Data:</b></label>
                                                <input type="date" name="date" value="'.$liburua->data.'"required>   
                                                <label for="sinopsia"><b>Sinopsia:</b></label>
                                                <textarea id="sinopsia" name="sinopsia" rows="4" cols="50">'.$liburua->sinopsia.'</textarea>
                                                <label for="irudia"><b>Irudiaren url-a:</b></label>
                                                <input type="text" placeholder="Sartu irudiaren url-a" name="irudia" value="'.$liburua->irudia.'" required> 
                                        <label for="deskarga"><b>Deskarga url-a:</b></label>
                                        <input type="text" placeholder="Sartu deskargarako url-a" name="deskarga" value="'.$liburua->deskarga.'" required> 
                                                <button type="submit">Editatu liburua</button>
                                            </div>
                                        </form>';
                                        }
                                }
                                if ($aurkitua == false){
                                    echo '<center><img src="images/liburua.png" width="150"><br><b>Liburua ez da existitzen.</b></center>';
                                }
                            }else{
                                echo "<script> window.location.href = 'kudeatuliburuak.php';</script>";      
                            }
                    ?>
				</div>
			</div>
		</div>
	<?php include 'footer.php'?>

<?php
        if (isset($_POST['titulua'])){
          if($_POST['titulua'])
            $fitxategia = "xml/liburuak.xml";
            $xml = simplexml_load_file($fitxategia);
            foreach($xml->liburua as $liburua){
                if($liburua["id"]==$_GET['id']){
                    $liburua->titulua = $_POST['titulua'];
                    $liburua->egilea = $_POST['egilea'];
                    $liburua->hizkuntza = $_POST['hizkuntza'];
                    $liburua->kategoria = $_POST['kategoria'];
                    $liburua->data = $_POST['date'];
                    $liburua->sinopsia = $_POST['sinopsia'];
                    $liburua->irudia = $_POST['irudia'];
                    $liburua->deskarga = $_POST['deskarga']; 
                    $xml->asXML('xml/liburuak.xml');
                    echo "<script> window.location.href = 'kudeatuliburuak.php?editatu=true';</script>";         
                }
            }

        }
    ?>