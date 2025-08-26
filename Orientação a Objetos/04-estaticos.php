
<?php

class Funcionario
{
    public string $nome;
    public float $salario;
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

$elesbao = new Funcionario("Elesbão", 600);
echo "Salario Mínimo: " . Funcionario::$salarioMinimo . PHP_EOL; // Salario Mínimo: 1518
echo "Formatado: " . Funcionario::getSalarioMinimoFormatado() . PHP_EOL; // Salario Mínimo: R$ 1.518,00
echo "Férias: R$ {$elesbao->calcularFerias(30)}"; // Férias: R$ 2024