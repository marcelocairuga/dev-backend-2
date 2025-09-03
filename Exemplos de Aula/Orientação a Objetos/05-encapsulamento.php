
<?php

/* 
  Modificadores de Acesso:
  - indicam a visibilidade de cada atributo ou método.

  - public: visível em todos os lugares. É o padrão quando não especificado.
  - private: visível apenas dentro da classe
  - protected: visível apenas dentro da classe e subclasses
*/

class Conta
{
    private float $saldo;
    function __construct(float $saldo = 0)
    {
        $this->saldo = $saldo;
    }

    public function depositar(float $valor): void {
        if ($valor > 0) {
            $this->saldo += $valor;
        } else {
            throw new Exception("Valor de depósito deve ser positivo.");
        }
    }

    public function sacar(float $valor): void {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
        } else {
            throw new Exception("Saque inválido.");
        }
    }

    public function getSaldo(): float {
        return $this->saldo;
    }
}

$banco = new Conta(1000);
$banco->depositar(500);
$banco->sacar(200);
echo "Saldo atual: {$banco->getSaldo()}\n"; // Saldo atual: 1300    
