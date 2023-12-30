<?php
    session_start();
    if(isset($_SESSION['userID'])){
        //wylogowanie: 
        session_unset(); //usunięcie wszystkich danych sesji
        session_destroy(); //zniszczenie sesji
        header('location: start.html');
    }
?>