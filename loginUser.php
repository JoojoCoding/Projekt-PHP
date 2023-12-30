<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    if(!isset($_POST['log'], $_POST['pass'])){
        echo "Brak przekazanych danych";
    }
    else {
        session_start();
        $con1 = $_SERVER['REQUEST_METHOD'] === 'POST';
        $con2 = hash_equals($_SESSION['log_token'], $_POST['loginToken']);
        if($con1 && $con2){
            $log = $_POST['log'];
            $pass = $_POST['pass'];
            $baza = mysqli_connect(host, user, pass, "accounts");
            if(!$baza){
                echo "Brak łączności z bazą";
            }
            else{
                $userLogin = mysqli_real_escape_string($baza, trim($log));
                $userPass = mysqli_real_escape_string($baza, trim($pass));
                $kwerenda = mysqli_prepare($baza, "SELECT login, pass FROM users where login=?");
                mysqli_stmt_bind_param($kwerenda, 's', $userLogin);
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $logVal, $passVal);
                mysqli_stmt_fetch($kwerenda);
                if(password_verify($userPass, $passVal)){
                    session_start();
                    $_SESSION['userID'] = $logVal;
                    unset($_SESSION['log_token']);
                    header('location: dashboard.php');
                }
                else {
                    echo "Incorrect login or password!";
                }
                mysqli_close($baza);
            }
        }
        else{
            echo "I co gówniarzu?";
        }
    }
?>