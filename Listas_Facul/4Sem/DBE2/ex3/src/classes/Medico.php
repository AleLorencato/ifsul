<?php
namespace Alexa\Ex3\classes;

use Alexa\Ex3\classes\Pessoa;

use Alexa\Ex3\classes\IMC;

class Medico extends Pessoa
{

	use IMC;

	private $CRM, $especialidade;

	public function __construct($nome, $crm, $especialidade, $idade = null, $altura = 1, $peso = 1)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->calcImc();
	}

	public function calcImc()
	{
		$valorImc = $this->peso / $this->altura ** 2;
		$this->setImc($valorImc);
	}

	public function getCRM()
	{
		return $this->CRM;
	}

	public function __toString(): string
	{
		$className = self::class;
		return "\n=== Dados de $className ==="
			. "\nHerança: " . parent::class
			. "\nAtributos:"
			. "\nIMC: " . $this->imc
			. "\n\tNome: $this->nome"
			. ($this->idade ? "\n\tIdade: $this->idade" : "")
			. "\n\tEspecialidade: $this->especialidade"
			. "\n\tCRM: $this->CRM\n";
	}

}