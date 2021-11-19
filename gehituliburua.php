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
</svg> Gehitu liburua:</b>
			<form action="/action_page.php" method="post">
  				<div class="container">
  					<br>
  					<label for="titulua"><b>Titulua:</b></label>
    				<input type="text" placeholder="Sartu liburuaren titulua" name="titulua" required>
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
    				</select>  
    				<label for="data"><b>Data:</b></label>
    				<input type="date" name="data" required>   
    				<label for="data"><b>Sinopsia:</b></label>
    				<textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
    				<label for="irudia"><b>Irudiaren url-a:</b></label>
    				<input type="text" placeholder="Sartu irudiaren url-a" name="irudia" required> 
            <label for="deskarga"><b>Deskarga url-a:</b></label>
            <input type="text" placeholder="Sartu deskargarako url-a" name="deskarga" required> 
    				<button type="submit">Gehitu liburua</button>
  				</div>
			</form>
				</div>
			</div>
		</div>
	<?php include 'footer.php'?>
