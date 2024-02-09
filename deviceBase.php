<?php
    define('host','localhost');
    define('user','root');
    define('pass','');
    
    $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');

    class Device {
        public $nr_seryjny, $producent, $model, $kategoria, $data_zgloszenia, $data_odbioru, $opis, $klient, $pracownik, $status;
        function __construct($n, $p, $m, $kt, $dz, $do, $o, $kl, $pr, $s)
        {
            $this->nr_seryjny = $n;
            $this->producent = $p;
            $this->model = $m;
            $this->kategoria = $kt;
            $this->data_zgloszenia = $dz;
            $this->data_odbioru = $do;
            $this->opis = $o;
            $this->klient = $kl;
            $this->pracownik = $pr;
            $this->status = $s;
        }
    }
    $kwerenda=mysqli_prepare($baza,
    "SELECT `nr_seryjny`, `producent`, `model`, `kategoria`, zgloszenie.data_zgloszenia, zgloszenie.data_odbioru, zgloszenie.opis, 
    CONCAT(klient.imie_k, ' ',klient.nazwisko_k) as Klient, 
    CONCAT(pracownik.imie_p,' ', pracownik.nazwisko_p) as Pracownik, 
    status_naprawy.status FROM `sprzet`
    LEFT JOIN zgloszenie ON sprzet.id_urzadzenia = zgloszenie.id_urzadzenia 
    LEFT JOIN pracownik ON zgloszenie.id_pracownika = pracownik.id_pracownika 
    LEFT JOIN klient ON zgloszenie.id_klienta = klient.id_klienta 
    LEFT JOIN status_naprawy ON sprzet.id_urzadzenia = status_naprawy.id_urzadzenia;");

    mysqli_stmt_execute($kwerenda);
    mysqli_stmt_bind_result($kwerenda, $nr_ser, $prod, $model, $kat, $dat_zgl, $dat_odb, $opis, $klient, $prac, $status);
    $deviceTab = [];
    while(mysqli_stmt_fetch($kwerenda)){
        $deviceTab[] = new Device($nr_ser, $prod, $model, $kat, $dat_zgl, $dat_odb, $opis, $klient, $prac, $status);
    }
    $toJSON = json_encode($deviceTab, JSON_PRETTY_PRINT);
    mysqli_close($baza);
    echo $toJSON;
?>