<?php
    session_start();
    header('location: start.html');
    if(isset($_SESSION['userID'])){
        //wylogowanie: 
        session_unset(); //usunięcie wszystkich danych sesji
        session_destroy(); //zniszczenie sesji
        
    }
?>