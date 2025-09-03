<?php 
abstract class PoligonoRegular {  
    protected int $lados;
    protected float $medidaDoLado;

    final public function getPerimetro(): float {
        return $this->lados * $this->medidaDoLado;        
    }
    
    abstract public function getArea(): float;
}

final class Quadrado extends PoligonoRegular {
    function __construct(float $medidaDoLado) {
        $this->lados = 4;
        $this->medidaDoLado = $medidaDoLado;
    }

    //public function getPerimetro(): float {} // Fatal error: Cannot override final method

    public function getArea(): float {
        return $this->medidaDoLado ** 2;
    }
}

$quadrado = new Quadrado(5);
echo $quadrado->getPerimetro();
echo PHP_EOL;
echo $quadrado->getArea();

// class QuadradoEspecial extends Quadrado {} 
// Fatal error: Class QuadradoEspecial cannot extend final class Quadrado
