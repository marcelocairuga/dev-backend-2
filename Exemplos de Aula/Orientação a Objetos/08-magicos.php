
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

    public function __get(string $propriedade) {
        if ($propriedade === 'nome') {
            return $this->nome;
        }
        if ($propriedade === 'salario') {
            return $this->salario;
        }
        throw new Exception("A propriedade '$propriedade' não existe ou não pode ser lida.");
    }

    public function __set(string $propriedade, mixed $valor) {
        if ($propriedade === 'salario') {
            if ($valor < $this->salario) {
                throw new Exception("Salário não pode ser reduzido.");
            }
            $this->salario = $valor;
            return;
        }
        throw new Exception("A propriedade '$propriedade' não existe ou não pode ser modificada.");
    }
    
    function __destruct()
    {
        //echo "\n$this->nome foi demitido.";
    }
}

$elesbao = new Funcionario("Elesbão", 400);

echo "Salário atual: $elesbao->salario\n"; // Salário atual: 400
$elesbao->salario = 7000;
echo "Novo salário: $elesbao->salario\n"; // Novo salário: 7000

//$elesbao->salario = 1800; // Uncaught Exception: Salário não pode ser reduzido.

//$elesbao->nome = "Elesbão Silva"; // Uncaught Exception: A propriedade 'nome' não existe ou não pode ser modificada.

//$elesbao->cargo = "Gerente"; // Uncaught Exception: A propriedade 'cargo' não existe ou não pode ser modificada.