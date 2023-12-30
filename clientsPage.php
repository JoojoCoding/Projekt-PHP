<style>
    .client-form{
        width: 300px;
        margin: 0px 500px;
        display: flex;
        flex-direction: column;

    }
</style>
<?php
    include_once("incl/menuPanel.php");

?>
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
    <input type="submit" value="Dodaj klienta">
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
        
         $kwerenda=mysqli_prepare($baza,"SELECT * FROM oddzial");
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda,$nr, $imie, $nazw, $firma, $ulica, $nDomu, $nLokalu, $kod, $miasto, $tel);
          while(mysqli_stmt_fetch($kwerenda)){
            echo "<tr>";
            echo "<td>$nr</td>
            
            <td>$firma</td>
            <td>$ulica</td>
            <td>$nDomu</td>
            <td>$nLokalu</td>
            <td>$kod</td>
            <td>$miasto</td>
            <td>$tel</td>";
            echo "</tr>";
          }
          mysqli_close($baza);
       ?> 
      </table>
