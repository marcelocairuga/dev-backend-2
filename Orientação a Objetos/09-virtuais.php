
<?php

class Triangulo
{
    private float $base;
    private float $altura;

    public float $area {
        get {
            return ($this->base * $this->altura) / 2;
        }
        set(float $valor) {
            throw new Exception("Área não pode ser definida diretamente!");
        }
    }

    function __construct(float $base, float $altura)
    {        
        $this->base = $base;
        $this->altura = $altura;
    }
}

$t1 = new Triangulo(20, 30);

echo "Área: $t1->area\n"; // Área: 300

// $t1->area = 50; //  Uncaught Exception: Área não pode ser definida diretamente!
