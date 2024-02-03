<style>
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
    .client-form{
        width: 300px;
        margin: 0px 0px 0 300px;
        display: flex;
        flex-direction: column;
    }
    section{
      display: flex;
      flex-direction: row;
      justify-content: center;
      width: 100%;
    }
    body {
      background-color: #151515;
    }
    .panel{
      width: 20%;
    }
    .client-form {
          width: 500px;
          margin: 0 auto;
          padding: 20px;
          background-color: #333;
          border-radius: 5px;
          color: white;
          font-family: 'Montserrat', sans-serif;
          height: 90vh;
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
          background: linear-gradient(118deg, rgba(27,141,148,1) 36%, rgba(80,241,190,1) 100%);
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }
        .client-box{
          border: 2px solid #b0c4de;
          padding: 10px;
          margin: 20px;
          width: 85%;
          border-radius: 5px;
          background-color: #add8e6;
        }
        .clients-list{
          /* border: 1px solid rgb(0, 255, 221); */
          border-radius: 5px;
          width: 500px;
          overflow-y: scroll;
          padding: 10px;
          height: 90vh;
          margin: 10px;
          /* text-align: center; */
          font-family: 'Montserrat', sans-serif ;
          background-color: #333;
        }
        .zar{
          color: white;
        }
        .client-name {
          font-size: 30px;
        }
</style>

<section>
<div class="panel">
  <?php include_once("incl/menuPanel.php"); ?>
</div>
<form action="clients.php" method="post" class="client-form">
    <h2 class="zar">Rejestracja klientów</h2>
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
<div class="clients-list">
        <h2 class="zar">Zarejestrowani klienci</h2>
        <?php
        define('host','localhost');
        define('user','root');
        define('pass','');
         $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');
        
         $kwerenda=mysqli_prepare($baza,"SELECT * FROM klient");
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda,$nr, $imie, $nazw, $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel, $email);
          
          while(mysqli_stmt_fetch($kwerenda)){
            echo "<div class='client-box'>";
            echo "<p class='client-name'>$imie $nazw</p>";
            echo "<p>Nazwa firmy: $firma</p>";
            echo "<p>Adres: ul. $ulica $nLokalu/$nDomu $kod $miasto</p>";
            echo "<p>Tel: $tel</p>";
            echo "<p>email: $email</p>";
          echo "</div>";
          }
          mysqli_close($baza);
       ?> 
</div>
</section>

