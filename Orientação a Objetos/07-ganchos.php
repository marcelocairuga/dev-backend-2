<?php

// PHP 8.4

class Funcionario
{
    public string $nome {
        get {
            return $this->nome;
        }
        set(string $nome) {
            if ($nome === "") {
                throw new Exception("Nome não pode ser vazio.");
            }
            $this->nome = $nome;
        }
    }

    public float $salario {
        get {
            return $this->salario;
        }
        set(float $salario) {
            if ($salario < self::$salarioMinimo) {
                throw new Exception("Salário não pode ser inferior ao mínimo.");
            }
            $this->salario = $salario;
        }
    }
    public static float $salarioMinimo = 1518;


    function __construct(string $nome, float $salario = 2000)
    {        
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function calcularFerias(int $dias): float {
        $base = $this->salario > self::$salarioMinimo 
            ? $this->salario 
            : self::$salarioMinimo;
        return ($base / 30) * $dias * (4/3);
    }

    public static function getSalarioMinimoFormatado(): string {
        return "R$ " . number_format(self::$salarioMinimo, 2, ',', '.');
    }

    function __destruct()
    {
        //echo "\n$this->nome foi demitido.";
    }
}

//$elesbao = new Funcionario("", 400); // Uncaught Exception: Nome não pode ser vazio

//$elesbao = new Funcionario("Elesbão", 400); // Uncaught Exception: Salário não pode ser inferior ao salário mínimo

$elesbao = new Funcionario("Elesbão", 4000);

$elesbao->salario = 7000;
echo "Salário atual: $elesbao->salario\n"; // Salário atual: 7000

//$elesbao->salario = 300; // Uncaught Exception: Salário não pode ser inferior ao mínimo.

$elesbao->salario = 5000;
echo "Novo salário: $elesbao->salario\n"; // Novo salário: 5000
