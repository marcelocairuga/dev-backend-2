<?php

class Funcionario {
    // declaração dos atributos
    public string $nome;
    public float $salario;

    // declaração dos métodos
    public function calcularFerias(int $dias): float {
        return ($this->salario / 30) * $dias * (4/3);
    }
}

// operador new cria uma nova instância de uma classe
$funcionario1 = new Funcionario();

// operador -> é utilizado para acessar as propriedade do objeto
$funcionario1->nome = "Elesbão";
$funcionario1->salario = 7200;
echo "Nome: $funcionario1->nome\n";
echo "Salário: $funcionario1->salario\n"; 

// operador -> também acessa os métodos
echo "Remuneração de férias: {$funcionario1->calcularFerias(10)}\n";

$elesbao = new Funcionario();
$elesbao->nome = "Elesbão";
$elesbao->salario = 4500;

echo "Salario: $elesbao->salario\n";
echo "Salário: $funcionario1->salario\n"; 