<!DOCTYPE html>
<html>
	<?php include 'header.php'?>
	<style>
		#footer{
			position: fixed;
  			bottom: 0;
		}
	</style>
	<body>
		<div id="loginKutxa">
			<div id="loginKutxaTitle"><b>LOGEATU</b></div>
			<form action="/action_page.php" method="post">
  				<div class="container">
   					<label for="eposta"><b>Eposta:</b></label>
    				<input type="email" placeholder="Sartu zure eposta" name="eposta" required>
    				<label for="pasahitza"><b>Pasahitza:</b></label>
    				<input type="password" placeholder="Sartu zure pasahitza" name="pasahitza" required>    
    				<button type="submit">Logeatu</button>
  				</div>
			</form>
		</div>
	<?php include 'footer.php'?>
