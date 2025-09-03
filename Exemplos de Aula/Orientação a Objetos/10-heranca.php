
<?php

class Pessoa {
    protected string $nome;

    function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function apresentacao(): void {
        echo "Olá, meu nome é $this->nome\n";
    }
}

  
class Aluno extends Pessoa {
    private string $curso;

    function __construct(string $nome, string $curso) {
        parent::__construct($nome);
        $this->curso = $curso;
    }

    public function apresentacao(): void {
        echo "Olá, meu nome é $this->nome e estudo $this->curso.\n";
    }
}

$genoveva = new Aluno("Genoveva", "Informática");

echo "Nome: {$genoveva->getNome()}\n"; // Nome: Genoveva

// echo $genoveva->nome; // Uncaught Error: Cannot access protected property