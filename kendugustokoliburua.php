<?php

include 'dbconfig.php';

global $zerbitzaria, $erabiltzailea, $gakoa, $db;
$nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

if($nireSQLI->connect_error) {
    die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
}

if(isset($_POST['eposta'])){
    $ema = $nireSQLI->query("DELETE FROM gustoko_liburuak WHERE user_eposta = '$_POST[eposta]' AND liburu_id = '$_POST[id]'");
}

header("Location: liburua.php?id=$_POST[id]");
?>