<?php
namespace Alexa\Ex3\classes;

use Alexa\Ex3\classes\Pessoa;

trait IMC
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

    public static function isNormal(Pessoa $pessoa)
    {
        if ($pessoa->getIdade() >= 19 && $pessoa->getIdade() <= 24) {
            if ($pessoa->getImc() >= 19 && $pessoa->getImc() <= 24) {
                return true;
            } else {
                return false;
            }
        } else if ($pessoa->getIdade() >= 25 && $pessoa->getIdade() <= 34) {
            if ($pessoa->getImc() >= 20 && $pessoa->getImc() <= 25) {
                return true;
            } else {
                return false;
            }
        } else if ($pessoa->getIdade() >= 35 && $pessoa->getIdade() <= 44) {
            if ($pessoa->getImc() >= 21 && $pessoa->getImc() <= 26) {
                return true;
            } else {
                return false;
            }
        } else if ($pessoa->getIdade() >= 45 && $pessoa->getIdade() <= 54) {
            if ($pessoa->getImc() >= 22 && $pessoa->getImc() <= 27) {
                return true;
            } else {
                return false;
            }
        } else if ($pessoa->getIdade() >= 55 && $pessoa->getIdade() <= 64) {
            if ($pessoa->getImc() >= 23 && $pessoa->getImc() <= 28) {
                return true;
            } else {
                return false;
            }
        } else if ($pessoa->getIdade() >= 65) {
            if ($pessoa->getImc() >= 24 && $pessoa->getImc() <= 29) {
                return true;
            } else {
                return false;
            }

        }

    }

}
