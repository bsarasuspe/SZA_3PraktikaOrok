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
    <script type="text/javascript" src="./js/AddBookValidation.js"></script>
	<body>
		<div id="content">
			<div id="liburuaGehituContainer">
                <?php
        if(isset($_GET["gehitu"])){
          echo "<div id='success-alert'>Liburua ongi gehitu da</div>";
        }
      ?>
				<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
   <line x1="13" y1="8" x2="15" y2="8"></line>
   <line x1="13" y1="12" x2="15" y2="12"></line>
</svg> Gehitu liburua:</b>
			<form name="form" id="form" action="" method="post" onsubmit="return AddBookValidation()">
  				<div class="container">
  					<br>
  					<label for="titulua"><b>Titulua:</b></label>
    				<input type="text" placeholder="Sartu liburuaren titulua" name="titulua">
                    <div id="titulua-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
            <label for="egilea"><b>Egilea:</b></label>
            <input type="text" placeholder="Sartu liburuaren egilea" name="egilea">
            <div id="egilea-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
    				<label for="hizkuntza"><b>Hizkuntza:</b></label>
    				<select name="hizkuntza">
    					<option selected>Euskara</option>
    					<option>Gaztelera</option>
    					<option>Ingelesa</option>
    				</select>  
    				<label for="kategoria"><b>Kategoria:</b></label>
    				<select name="kategoria">
    					<option selected>Komedia</option>
    					<option>Suspensea</option>
    					<option>Fantasia</option>
    					<option>Zientzia fikzioa</option>
                        <option>Mexikanoa</option>
    				</select>  
    				<label for="data"><b>Data:</b></label>
    				<input type="date" name="date">   
    				<label for="sinopsia"><b>Sinopsia:</b></label>
    				<textarea id="sinopsia" name="sinopsia" rows="4" cols="50"></textarea>
                    <div id="sinopsia-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
    				<label for="irudia"><b>Irudiaren url-a:</b></label>
    				<input type="text" placeholder="Sartu irudiaren url-a" name="irudia"> 
                    <div id="irudia-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
            <label for="deskarga"><b>Deskarga url-a:</b></label>
            <input type="text" placeholder="Sartu deskargarako url-a" name="deskarga"> 
            <div id="deskarga-error" style="color: red; font-size: 11px; font-style: italic; margin-top: -5px; margin-bottom: 5px;"></div>
    				<button type="submit">Gehitu liburua</button>
  				</div>
			</form>
				</div>
			</div>
		</div>
	<?php include 'footer.php'?>

<?php
        if (isset($_POST['titulua'])){
          if($_POST['titulua'])
            $fitxategia = "xml/liburuak.xml";
            $xml = simplexml_load_file($fitxategia);
            $azkenid = $xml["azkenid"];
            $azkenid = $azkenid + 1;
            $xml["azkenid"] = $azkenid;
            $xmlliburua = $xml->addChild('liburua');
            $xmlliburua -> addAttribute('id', $azkenid); 
            $xmltitulua = $xmlliburua -> addChild('titulua', $_POST['titulua']);
            $xmlegilea = $xmlliburua -> addChild('egilea', $_POST['egilea']);
            $xmlhizkuntza = $xmlliburua -> addChild('hizkuntza', $_POST['hizkuntza']);
            $xmlkategoria = $xmlliburua -> addChild('kategoria', $_POST['kategoria']);
            $new_date = date('Y-m-d', strtotime($_POST['date']));
            $xmldata = $xmlliburua -> addChild('data', $new_date);
            $xmlsinopsia = $xmlliburua -> addChild('sinopsia', $_POST['sinopsia']);
            $xmlirudia = $xmlliburua -> addChild('irudia', $_POST['irudia']);
            $xmldeskarga = $xmlliburua -> addChild('deskarga', $_POST['deskarga']);
            $xml->asXML('xml/liburuak.xml');
            echo "<script> window.location.href = 'gehituliburua.php?gehitu=true';</script>";
        }
    ?>
