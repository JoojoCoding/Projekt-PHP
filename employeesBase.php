<?php
    define('host','localhost');
    define('user','root');
    define('pass','');
    
    $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');

    class Worker {
        public $imie, $nazw, $tel, $email, $odd;
        function __construct($i, $n, $t, $e, $o)
        {
            $this->imie = $i;
            $this->nazw = $n;
            $this->tel = $t;
            $this->email = $e;
            $this->odd = $o;
        }
    }
    $kwerenda=mysqli_prepare($baza, "SELECT pracownik.imie_p, pracownik.nazwisko_p, pracownik.telefon_k, pracownik.email_k, oddzial.nazwa_oddzialu FROM `pracownik` LEFT JOIN oddzial ON pracownik.id_odzialu = oddzial.id_odzialu;");
    mysqli_stmt_execute($kwerenda);
    mysqli_stmt_bind_result($kwerenda, $imie, $nazw, $tel, $email, $odd);
    $workerTab = [];
    while(mysqli_stmt_fetch($kwerenda)){
        $workerTab[] = new Worker($imie, $nazw, $tel, $email, $odd);
    }
    $toJSON = json_encode($workerTab, JSON_PRETTY_PRINT);
    mysqli_close($baza);
    echo $toJSON;
?>