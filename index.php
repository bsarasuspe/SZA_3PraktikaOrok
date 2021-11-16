<!DOCTYPE html>
<html>   
	<?php include 'header.php'?>
	<body>

	<div id="content">
		<div id="column1">
			<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="10" cy="10" r="7"></circle>
   <line x1="21" y1="21" x2="15" y2="15"></line>
</svg> Bilatu liburuak:</b>
			<form>
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
	<div id="kategoria">Komedia</div>
	<div id="kategoria">Suspensea</div>
	<div id="kategoria">Fantasia</div>
	<div id="kategoria">Zientzia-fikzioa</div>
<br>
<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <rect x="3" y="12" width="6" height="8" rx="1"></rect>
   <rect x="9" y="8" width="6" height="12" rx="1"></rect>
   <rect x="15" y="4" width="6" height="16" rx="1"></rect>
   <line x1="4" y1="20" x2="18" y2="20"></line>
</svg> Estadistikak: </b>
		<div id="estadistika">Erabiltzaile erregistratuak: 20</div>
		<div id="estadistika">Liburu kopurua: 230</div>
		</div>


		<div id="column2">
			<b><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
   <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
   <line x1="3" y1="6" x2="3" y2="19"></line>
   <line x1="12" y1="6" x2="12" y2="19"></line>
   <line x1="21" y1="6" x2="21" y2="19"></line>
</svg>  Azken liburuak:</b><br>
			<div id="liburuaContainer"></div>
			<div id="liburuaContainer"></div>
			<div id="liburuaContainer"></div>
			<div id="liburuaContainer"></div>
		</div>
	</div>
		
	<?php include 'footer.php'?>
