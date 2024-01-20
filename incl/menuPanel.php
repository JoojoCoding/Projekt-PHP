<!DOCTYPE html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
     .menu-panel{
        width: 18vw;
        height: 100vh;
        background-color: black;
        position: fixed;
        top: 0px;
        left: 0px;
        color: white;
        font-family: 'Montserrat', sans-serif;

    }
    .circ{
        border: 2px solid white;
        width: 3rem;
        height: 3rem;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        border-radius: 100%;
        margin: 10px;
        padding: 5px;
    }
    .user-cont{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .user-name{
        font-size: 30px;
        margin: 0px 30px;
    }
    .app-list{
        list-style-type: none;
    }
    .app-list *{
        padding: 10px 5px;
        text-decoration: none;
        color: white;
    }
    .app-list li{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .logoutForm{
        display: flex;
        justify-content: center;
    }
    .wyl{
        width: 60%; 
        padding:10px;
        border-radius: 7px;
        margin: 5px 10%;
        border: 1px solid rgb(71, 71, 71);
        color: white;
        background: linear-gradient(118deg, rgba(27,141,148,1) 36%, rgba(80,241,190,1) 100%);
    }
    
</style>
    <div class="menu-panel">
        <div class="user-cont">
            <p class="circ">
                <box-icon type='solid' name='user' color="white" size="lg"></box-icon>
            </p>
            
            <p class="user-name">
            <?php
                session_start();
                echo $_SESSION['userID'];
            ?>
            </p>
        </div>
        <hr>
        <form action="logOut.php" method="post" class="logoutForm">
            <input type="submit" value="Wyloguj" class="wyl">
        </form>
        <ul class="app-list">
            <li><box-icon type='solid' name='buildings' color="white" size="cssSize" animation="tada-hover"></box-icon><a href="dashboard.php">Dane Oddziału</a></li>
            <li><box-icon type='solid' name='user-detail' color="white" size="cssSize" animation="tada-hover"></box-icon><a href="clientsPage.php">Klienci serwisu</a></li>
            <li><box-icon name='briefcase' type='solid' color="white" size="cssSize" animation="tada-hover"></box-icon><a href="employees.php">Pracownicy serwisu</a></li>
            <li><box-icon type='solid' name='cabinet' color="white" size="cssSize" animation="tada-hover"></box-icon><a href="devices.php">Kartoteka sprzętu</a></li>
        </ul>
        
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

