<?php
require_once "../../model/pdo.Banco.class.php";

class Dashboard extends Banco {

    function lucroAnual(){
        global $pdo;
        $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        $valor = 0;
        $i = 0;
        foreach ($meses as $mes){
            $valor[$mes] = $i;
            $i++;
        }
    }
}