<?php 
abstract class ContaBancaria {  
    protected float $saldo = 0;

    final public function depositar(float $valor): void {
        $this->saldo += $valor;
    }

    abstract public function sacar(float $valor): bool;
}

class ContaCorrente extends ContaBancaria {
    private float $limite;

    function __construct(float $saldoInicial = 0, float $limite = 0) {
        $this->saldo = $saldoInicial;
        $this->limite = $limite;
    }

    public function sacar(float $valor): bool {
        if ($valor <= $this->saldo + $this->limite) {
            $this->saldo -= $valor;
            return true;
        }
        return false;
    }
}

$cc = new ContaCorrente(limite: 500);
$cc->depositar(500);
echo $cc->sacar(700); // 1 (true)

// $cb = new ContaBancaria(); // Uncaught Error: Cannot instantiate abstract class
