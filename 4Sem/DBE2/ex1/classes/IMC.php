<?php
include_once 'Pessoa.php';
class IMC
{
    public static function calc(Pessoa $pessoa)
    {
        $valorImc = $pessoa->peso / $pessoa->altura ** 2;
        $pessoa->setImc($valorImc);
    }

    public static function classificar(Pessoa $pessoa)
    {
        if ($pessoa->getImc() < 18.5) {
            return "Abaixo do peso\n";
        } elseif ($pessoa->getImc() < 24.9) {
            return "Peso normal\n";
        } elseif ($pessoa->getImc() < 29.9) {
            return "Sobrepeso\n";
        } else {
            return "Obesidade\n";
        }
    }

}
