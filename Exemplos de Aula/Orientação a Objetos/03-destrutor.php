<?php

class Funcionario
{
    public string $nome;
    public float $salario;

    function __construct(string $nome, float $salario = 2000)
    {        
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function calcularFerias(int $dias): float {
        return ($this->salario / 30) * $dias * (4/3);
    }

    function __destruct()
    {
        echo "\n$this->nome foi demitido(a).";
    }
}

$elesbao = new Funcionario("Elesbão", 5800);
echo "\nNome: " . $elesbao->nome;   // Nome: Elesbão
echo "\nSalário: " . $elesbao->salario; // Salário: 5800

$genoveva = new Funcionario("Genoveva");
echo "\nNome: " . $genoveva->nome;   // Nome: Genoveva
echo "\nSalário: " . $genoveva->salario;  // Salário: 2000

$elesbao = null;
echo "\n\$elesbao foi destruído antes do encerramento do script...";

