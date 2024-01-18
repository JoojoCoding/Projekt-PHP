<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
    .depart{
        position: absolute;
        left: 350px;
        display: flex;
        flex-direction: row;
    }
    .wrapper {
          max-width: 500px;
          margin: 0 auto;
          padding: 20px;
          background-color: #333;
          border-radius: 5px;
          color: white;
          font-family: 'Montserrat', sans-serif;
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          /* box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); */
        }
      
        .form-label {
          font-weight: bold;
          display: block;
          margin-bottom: 10px;
        }
      
        input[type="text"],
        input[type="tel"],
        input[type="email"] {
          width: 90%;
          padding: 10px;
          border-radius: 5px;
          border: 1px solid #555;
          margin-bottom: 20px;
          background-color: #444;
          color: #fff;
        }
      
        .form-submit {
          background-color: #4CAF50;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }
      
        input[type="submit"]:hover {
          background-color: #45a049;
        }
        .tab{
          border-collapse: collapse;
          margin: 20px;
        }
        .tab *{
          border: 1px solid black;
          padding: 10px;
        }
</style>
<?php
  include_once("incl/menuPanel.php");
?>
<section class="depart"> 
    <form class="wrapper" action="add_department.php" method="post">
        <div>
          
        </div>
        <label for="nazwa_oddzialu" class="form-label">Nazwa oddziału:</label>
        <input type="text" id="nazwa_oddzialu" name="nazwa_oddzialu" class="form-input" required>

        <label for="ulica" class="form-label">Ulica:</label>
        <input type="text" id="ulica" name="ulica" class="form-input" required>

        <label for="numer_domu" class="form-label">Numer domu:</label>
        <input type="text" id="numer_domu" name="numer_domu" class="form-input" required>

        <label for="numer_lokalu" class="form-label">Numer lokalu:</label>
        <input type="text" id="numer_lokalu" name="numer_lokalu" class="form-input">

        <label for="kod_pocztowy" class="form-label">Kod pocztowy:</label>
        <input type="text" id="kod_pocztowy" name="kod_pocztowy" class="form-input" required>

        <label for="miejscowosc" class="form-label">Miejscowość:</label>
        <input type="text" id="miejscowosc" name="miasto" class="form-input" required>

        <label for="telefon" class="form-label">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" class="form-input" required>

        <input type="submit" value="Zarejestruj oddział" class="form-submit">
    </form>
    <div>
      <table class="tab">
        <tr>
          <th>Nr</th>
          <th>Nazwa oddziału</th>
          <th>Ulica</th>
          <th>Numer domu</th>
          <th>Numer lokalu</th>
          <th>kod pocztowy</th>
          <th>Miasto</th>
          <th>Telefon</th>
        </tr>
        <?php
        define('host','localhost');
        define('user','root');
        define('pass','');
         $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');
        
         $kwerenda=mysqli_prepare($baza,"SELECT * FROM oddzial");
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda,$nr, $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel);
          while(mysqli_stmt_fetch($kwerenda)){
            echo "<tr>";
            echo "<td>$nr</td><td>$firma</td><td>$ulica</td><td>$nDomu</td><td>$nLokalu</td><td>$kod</td><td>$miasto</td><td>$tel</td>";
            echo "</tr>";
          }
          mysqli_close($baza);
       ?> 
      </table>
    </div>
    </section>