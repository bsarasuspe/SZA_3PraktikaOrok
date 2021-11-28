<?php
include "DbConfig.php";
    $datuak = $_POST;
    if($datuak["eposta"]>0 && $datuak["izena"]>0 && $datuak["pasahitza1"]>0 && $datuak["pasahitza2"]){
        if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i", $datuak["eposta"])){
            if(strlen($datuak["pasahitza1"]) < 8){
                if($datuak["pasahitza1"] != $datuak["pasahitza2"]){
                    global $zerbitzaria, $erabiltzailea, $gakoa, $db;
                    $nireSQLI = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

                    if($nireSQLI->connect_error) {
                        echo "<script> alert('DB-ra konexio bat egitean errore bat egon da. Berriro saiatu.')";
                        return;
                    }

                    $sqlInsertQuestion = "INSERT INTO erabiltzaileak(eposta, izena, pasahitza, mota) 
                                            VALUES ('$_POST[eposta]', '$_POST[izena]', '$_POST[pasahitza]', '0')";

                    if (!$nireSQLI->query($sqlInsertQuestion)) {
                        $mezua = str_replace("'", "\'", $nireSQLI->error);
                        echo "<script>alert('Errorea datu-basean: $mezua')</script>";
                        return;
                    }
                    //header("location: index.php");
                }
            }
        }
    }

?>