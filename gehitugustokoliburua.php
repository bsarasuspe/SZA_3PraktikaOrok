<?php

include 'DbConfig.php';

global $zerbitzaria, $erabiltzailea, $gakoa, $db;
$nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

if($nireSQLI->connect_error) {
    die("DB-ra konexio bat egitean errore bat egon da: " . $nireSQLI->connect_error);
}

if(isset($_POST['eposta'])){
    $ema = $nireSQLI->query("INSERT INTO gustoko_liburuak VALUES('$_POST[eposta]', '$_POST[id]')");
}

header("Location: liburua.php?id=$_POST[id]");
?>