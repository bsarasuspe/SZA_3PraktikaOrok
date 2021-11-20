<!DOCTYPE html>
	<head>
		<title>Liburutegia</title>
		<meta charset=UTF-8">
		<link rel='stylesheet' type='text/css' href='styles.css'/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php
			session_start();
		?>
		<div id="header">
			<div id="headertext">LIBURUTEGIA</div>
		</div>
		<div id="nav">
			<div style="width:1000px;margin:auto;">
							<ul>
			  <li><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
   <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
   <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
</svg> Hasiera</a></li>
		<?php
			if(isset($_SESSION['kautotua']) && ($_SESSION['kautotua']) == "BAI"){
				if($_SESSION['mota'] == 1){
					echo '<li><a href="gehituliburua.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <line x1="12" y1="5" x2="12" y2="19"></line>
   <line x1="5" y1="12" x2="19" y2="12"></line>
</svg> Liburua gehitu</a></li>
<li><a href="ezabatuliburua.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <line x1="4" y1="7" x2="20" y2="7"></line>
   <line x1="10" y1="11" x2="10" y2="17"></line>
   <line x1="14" y1="11" x2="14" y2="17"></line>
   <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
   <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
</svg> Kudeatu liburuak</a></li>';
				}	
			}else{
				echo '<li><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="9" cy="7" r="4"></circle>
   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
   <path d="M16 11l2 2l4 -4"></path>
</svg> Logeatu</a></li>
<li><a href="register.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="9" cy="7" r="4"></circle>
   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
   <path d="M16 11h6m-3 -3v6"></path>
</svg> Erregistratu</a></li>';
			}
			if(isset($_SESSION['kautotua']) && ($_SESSION['kautotua']) == "BAI"){
				echo '<li><a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
   <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
</svg> Saioa itxi</a></li>';
			}
		?>
			</ul>
			</div>

		</div>
	</body>
	