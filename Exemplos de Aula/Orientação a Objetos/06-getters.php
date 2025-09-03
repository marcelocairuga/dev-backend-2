
<?php


class Funcionario
{
    private string $nome;
    private float $salario;
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

    public function getNome(): string {
        return $this->nome;
    }

    public function getSalario(): float {
        if ($this->salario < self::$salarioMinimo) {
            return self::$salarioMinimo;
        }
        return $this->salario;
    }

    public function setNome(string $nome): void {
        if ($nome === "") {
            throw new Exception("Nome não pode ser vazio.");
        }
        $this->nome = $nome;
    }

    public function setSalario(float $salario): void {
        if ($salario < $this->salario) {
            throw new Exception("Salário não pode ser reduzido!");
        }
        $this->salario = $salario;
    }

    function __destruct()
    {
        //echo "\n$this->nome foi demitido.";
    }
}

$elesbao = new Funcionario("Elesbão", 400);

//echo $elesbao->salario; // Uncaught Error: Cannot access private property 

echo "Salário atual: {$elesbao->getSalario()}\n"; // Salário atual: 1518

//$elesbao->setSalario(300); // Uncaught Exception: Salário não pode ser reduzido!

$elesbao->setSalario(5000);
echo "Novo salário: {$elesbao->getSalario()}\n"; // Novo salário: 5000
