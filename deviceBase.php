<?php
    define('host','localhost');
    define('user','root');
    define('pass','');
    
    $baza=mysqli_connect(host, user, pass, 'serwis_3ct_wojtekb');

    class Device {
        public $id, $nr_seryjny, $producent, $model, $kategoria;
        function __construct($i, $n, $p, $m, $k)
        {
            $this->id = $i;
            $this->nr_seryjny = $n;
            $this->producent = $p;
            $this->model = $m;
            $this->kategoria = $k;
        }
    }
    $kwerenda=mysqli_prepare($baza,"SELECT * FROM sprzet");
    mysqli_stmt_execute($kwerenda);
    mysqli_stmt_bind_result($kwerenda,$id, $nr_ser, $prod, $model, $kat);
    $deviceTab = [];
    $x = 0;
    while(mysqli_stmt_fetch($kwerenda)){
        $deviceTab[$x] = new Device($id, $nr_ser, $prod, $model, $kat);
        $x++;
    }
    $toJSON = json_encode($deviceTab, JSON_PRETTY_PRINT);
    mysqli_close($baza);
    echo $toJSON;
?>