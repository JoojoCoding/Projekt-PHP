<?php
    define('host','localhost');
    define('user','root');
    define('pass','');

    $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');
    
    if(!$baza){
        echo "Brak łączności z bazą";
    }
    else{
        $imie = $_POST["imie_k"];
        $nazw = $_POST["nazw_k"];
        $firm = $_POST["firma_k"];
        $ulica = $_POST["ulica_k"];
        $nrDomu = $_POST["nrDomu_k"];
        $nrLokalu = $_POST["nrLokalu_k"];
        $kod = $_POST["kod"];
        $miasto = $_POST["miasto"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];

        $kwerenda = mysqli_prepare($baza, "INSERT INTO klient VALUES(null,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($kwerenda, 'ssssssssss', $imie, $nazw, $firm, $ulica, $nrDomu, $nrLokalu, $kod, $miasto, $tel, $email);
        mysqli_stmt_execute($kwerenda);
        if(mysqli_stmt_affected_rows($kwerenda) == 1){
            echo "dodano klienta";
        }
        else {
            echo "coś nie pykło";
        }
    }
    mysqli_close($baza);
?>