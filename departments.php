<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
    ::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #333;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #add8e6;
  border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
    .depart{
        /* position: absolute;
        left: 350px; */
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 50%;
        
    }
    .wrapper {
          max-width: 500px;
          margin: 0 5px;
          padding: 20px;
          background-color: #333;
          border-radius: 5px;
          height: 90vh;
          color: white;
          margin: 10px;
          font-family: 'Montserrat', sans-serif;
          /* border: 1px solid rgb(0, 255, 221); */
          /* box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); */
        }
      
        input[type="text"],
        input[type="tel"],
        input[type="email"] {
          width: 70%;
          padding: 5px;
          height: 20px;
          border-radius: 5px;
          border: 1px solid #555;
          margin: 15px 5px;
          background-color: #444;
          color: #fff;
        }
      
        .form-submit {
          background: linear-gradient(118deg, rgba(27,141,148,1) 36%, rgba(80,241,190,1) 100%);
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }
      
        input[type="submit"]:hover {
          background-color: #45a049;
        }
        .department-list{
          /* border: 1px solid rgb(0, 255, 221); */
          border-radius: 5px;
          width: 80%;
          overflow-y: scroll;
          height: 96vh;
          margin: 10px;
          text-align: center;
          font-family: 'Montserrat', sans-serif ;
          background-color: #333;
         
        }
        .zar{
          color: white;
        }
        .department-box{
          border: 2px solid #b0c4de;
          padding: 10px;
          margin: 20px;
          width: 85%;
          border-radius: 5px;
          background-color: #add8e6;
        }
</style>
<?php
  include_once("incl/menuPanel.php");
?>
<section class="depart"> 
    <form class="wrapper" action="add_department.php" method="post">
      <h2>Rejestracja oddziału</h2>
        <input type="text" id="nazwa_oddzialu" name="nazwa_oddzialu" class="form-input" required placeholder="Nazwa oddziału">
        <input type="text" id="ulica" name="ulica" class="form-input" required placeholder="Ulica">
        <input type="text" id="numer_domu" name="numer_domu" class="form-input" required placeholder="Numer domu">
        <input type="text" id="numer_lokalu" name="numer_lokalu" class="form-input" placeholder="Numer Lokalu">
        <input type="text" id="kod_pocztowy" name="kod_pocztowy" class="form-input" required placeholder="Kod pocztowy">
        <input type="text" id="miejscowosc" name="miasto" class="form-input" required placeholder="Miejscowość">
        <input type="tel" id="telefon" name="telefon" class="form-input" required placeholder="Telefon">
        <input type="submit" value="Zarejestruj oddział" class="form-submit">
    </form>
      <div class="department-list">
        <h2 class="zar">Zarejestrowane oddziały</h2>
        <?php
        define('host','localhost');
        define('user','root');
        define('pass','');
         $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');
        
         $kwerenda=mysqli_prepare($baza,"SELECT * FROM oddzial");
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda,$nr, $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel);
          while(mysqli_stmt_fetch($kwerenda)){
            echo "<div class='department-box'>";
              echo "<h2>$firma</h2>";
              echo "<p>ul. $ulica $nLokalu/$nDomu</p>";
              echo "<p>Kod pocztowy: $kod</p>";
              echo "<p>Miejscowość: $miasto</p>";
              echo "<p>Tel: $tel</p>";
            echo "</div>";
          }
          mysqli_close($baza);
       ?> 
      </div>
    </section>