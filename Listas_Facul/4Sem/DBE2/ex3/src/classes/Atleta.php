<?php
namespace Alexa\Ex3\classes;

use Alexa\Ex3\classes\Pessoa;

use Alexa\Ex3\classes\IMC;


class Atleta extends Pessoa
{
  use IMC;

  public function calcImc()
  {
    $valorImc = $this->peso / $this->altura ** 2;
    $this->setImc($valorImc);
  }

  public function classificar(Pessoa $pessoa)
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