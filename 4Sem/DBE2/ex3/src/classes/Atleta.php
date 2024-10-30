<?php
namespace Alexa\Ex3\classes;

use Alexa\Ex3\classes\Pessoa;

use Alexa\Ex3\classes\IMC;


class Atleta extends Pessoa implements iFuncionario
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

  public function mostrarSalario()
  {
    return "Salário: R$ 1000,00\n";
  }

  public function mostrarTempoContrato()
  {
    return "Contrato de x anos\n";
  }
  public function __toString(): string
  {
    $saida = "\n===Dados do " . self::class
      . "==="
      . "\nNome: $this->nome"
      . ($this->idade ? "\nIdade: $this->idade" : "")
      . "\nPessoa: $this->peso"
      . "\nAltura: $this->altura";

    $saida .= (isset($this->imc))
      ? "\nIMC: " . number_format($this->imc, 3)
      : "";
    return $saida;
  }

}