<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    
    if(!isset($_POST['log'], $_POST['pass'])){
        echo "Brak przekazanych danych";
    }
    else{
        $log = $_POST['log'];
        $pass = $_POST['pass'];
        $baza = mysqli_connect(host, user, pass, "accounts");
        if(!$baza){
            echo "Brak łączności z bazą";
        }
        else{
            $userLogin = mysqli_real_escape_string($baza, trim($log));
            $userPass = mysqli_real_escape_string($baza, trim($pass));

            $userPass = password_hash($userPass, PASSWORD_DEFAULT);
            $kwerenda = mysqli_prepare($baza, "INSERT INTO users VALUES(null,?,?,CURRENT_DATE(), 'D')");
            mysqli_stmt_bind_param($kwerenda, 'ss', $userLogin, $userPass);
            mysqli_stmt_execute($kwerenda);
            if(mysqli_stmt_affected_rows($kwerenda) == 1){
                echo "działa lol";
            }
            else {
                echo "coś nie pykło";
            }
            mysqli_close($baza);
        }
    }
    
?>