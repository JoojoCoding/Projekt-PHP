<style>
    .client-form{
        width: 300px;
        margin: 0px 0px 0 300px;
        display: flex;
        flex-direction: column;

    }
    section{
      display: flex;
      flex-direction: column;
      width: 70%;
      margin-left: 300px;
    }
    body {
      width: 100%;
    }
    .tab{
      border-collapse: collapse;
      margin: 20px 0;
    }
    .tab *{
      border: 1px solid black;

    }
    .client-form {
          max-width: 500px;
          margin: 0 auto;
          padding: 20px;
          background-color: #333;
          border-radius: 5px;
          color: white;
          font-family: 'Montserrat', sans-serif;
          /* box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); */
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"] {
          width: 90%;
          padding: 5px;
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
</style>
<?php
  include_once("incl/menuPanel.php");
?>
<section>
<form action="clients.php" method="post" class="client-form">
    <input type="text" name="imie_k" id="" placeholder="Imię klienta" required>
    <input type="text" name="nazw_k" id="" placeholder="Nazwisko klienta" required>
    <input type="text" name="firma_k" id="" placeholder="Firma klienta" required>
    <input type="text" name="ulica_k" id="" placeholder="Ulica" required>
    <input type="text" name="nrDomu_k" id="" placeholder="Numer domu" required>
    <input type="text" name="nrLokalu_k" id="" placeholder="Numer lokalu">
    <input type="text" name="kod" id="" placeholder="Kod pocztowy" required>
    <input type="text" name="miasto" id="" placeholder="Miejscowość" required>
    <input type="text" name="tel" id="" placeholder="Telefon" required>
    <input type="text" name="email" id="" placeholder="Email" required>
    <input type="submit" value="Dodaj klienta" class="form-submit">
</form>
<table class="tab">
        <tr>
          <th>Nr</th>
          <th>Imie</th>
          <th>Nazwisko</th>
          <th>Firma</th>
          <th>Ulica</th>
          <th>Numer domu</th>
          <th>Numer lokalu</th>
          <th>kod pocztowy</th>
          <th>Miasto</th>
          <th>Telefon</th>
          <th>Email</th>
        </tr>
        <?php
        define('host','localhost');
        define('user','root');
        define('pass','');
         $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');
        
         $kwerenda=mysqli_prepare($baza,"SELECT * FROM klient");
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda,$nr, $imie, $nazw, $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel, $email);
          while(mysqli_stmt_fetch($kwerenda)){
            echo "<tr>";
            echo "<td>$nr</td>
            <td>$imie</td>
            <td>$nazw</td>
            <td>$firma</td>
            <td>$ulica</td>
            <td>$nDomu</td>
            <td>$nLokalu</td>
            <td>$kod</td>
            <td>$miasto</td>
            <td>$tel</td>
            <td>$email</td>";
            echo "</tr>";
          }
          mysqli_close($baza);
       ?> 
      </table>
</section>

