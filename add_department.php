<?php
    session_start();
    if(isset($_SESSION["userID"]) && $_SERVER["REQUEST_METHOD"] === "POST"){
        $baza = mysqli_connect('localhost', 'root', '', 'serwis_3ct_wojtekb');

        $firma = $_POST['nazwa_oddzialu'];
        $ulica = $_POST['ulica'];
        $nDomu = $_POST['numer_domu'];
        $nLokalu = $_POST['numer_lokalu'];
        $kod = $_POST['kod_pocztowy'];
        $miasto = $_POST['miasto'];
        $tel = $_POST['telefon'];
        
        if(!$baza){
            echo "Brak łączności z bazą";
        }
        else{
            $kwerenda = mysqli_prepare($baza,'INSERT INTO oddzial VALUES(null,?,?,?,?,?,?,?)');
            mysqli_stmt_bind_param($kwerenda, 'ssissss', $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel);
            mysqli_stmt_execute($kwerenda);
            //mysqli_stmt_bind_result($kwerenda, $firma, $ulica, $nDomu, $nLokalu, $kod,  $miasto, $tel, $email);
            echo "pomyślnie dodano stronę";
            mysqli_close($baza);
        }

    }
    else{
        echo "nie zalogowany";
    }
    header("location:departments.php");
    
    

?>
