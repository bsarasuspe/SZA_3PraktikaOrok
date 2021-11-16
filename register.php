<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
	<body>
		<div id="loginKutxa">
			<div id="loginKutxaTitle"><b>ERREGISTRATU</b></div>
			<form action="/action_page.php" method="post">
  				<div class="container">
  					<br>
  					<label for="izena"><b>Izena abizenak:</b></label>
    				<input type="text" placeholder="Sartu zure izen abizenak" name="izena" required>
   					<label for="eposta"><b>Eposta:</b></label>
    				<input type="email" placeholder="Sartu zure eposta" name="eposta" required>
    				<label for="pasahitza"><b>Pasahitza:</b></label>
    				<input type="password" placeholder="Sartu zure pasahitza" name="pasahitza" required>   
    				<label for="pasahitza"><b>Errepikatu pasahitza:</b></label>
    				<input type="password" placeholder="Errepikatu pasahitza" name="pasahitza" required>   
    				<button type="submit">Erregistratu</button>
  				</div>
			</form>
		</div>
	<?php include 'footer.php'?>