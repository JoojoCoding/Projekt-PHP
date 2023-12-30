<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body{
            background-color: rgba(216, 216, 216, 0.527);
        }
        section{
            border: 1px solid black;
            width: 500px;
            margin: auto;
            background-color: rgb(32, 32, 32);
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 10px;
            padding: 20px;
            margin-top: 200px;
           
            height: 300px;
        }
        section form{
            display: flex;
            flex-direction: column;
            /* width: 90%; */
            justify-content: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* height: 400px; */
        }
        form *{
            padding: 10px;
            border-radius: 10px;
            border: 1px solid rgb(71, 71, 71);
            margin: 10px;
            width: 80%;

        }
        .log{
            width: 200px;
            background-color: rgb(255, 229, 200);
        }
        .log:hover{
            background-color: rgb(250, 171, 74);
            transition-duration: 0.5s;
        }
        
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['log_token'])){
        $_SESSION['log_token'] = bin2hex(random_bytes(32));
    }
    ?>
    <section>
        <h1>Formularz logowania</h1>
        <form action="loginUser.php" method="post">
            <input type="text" placeholder="Login" name="log">
            <input type="password" placeholder="Hasło" name="pass">
            <input type="hidden" name="loginToken" value="<?php echo $_SESSION['log_token']?>">
            <input type="submit" value="Zaloguj" class="log">
        </form>
    </section>
</body>
</html>